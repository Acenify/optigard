<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceController extends Controller
{
    public function create(Customer $customer)
    {
        $customerProducts = $customer->products()->with('product', 'category')->get();

        return view('invoice.create', [
            'customer' => $customer,
            'customerProducts' => $customerProducts
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            // ✅ pastikan nama tabel sesuai konvensi (plural)
            'customer_id' => 'required|exists:customer,id',
            'user_id'              => 'required|exists:users,id',
            'invoice_date'         => 'required|date',
            'type'                 => 'required|string',
            'products'             => 'required|array',
            // ✅ plural
            'products.*.customer_product_id' => 'required|exists:customer_product,id',
            'products.*.price'     => 'required|integer|min:0',
            'discount'             => 'nullable|integer|min:0',
            // input dari form tetap down_payment (snake_case)
            'down_payment'         => 'nullable|integer|min:0',
        ]);

        DB::beginTransaction();
        try {
            $totalPrice = collect($request->products)->sum('price');

            $discount     = (int) ($request->discount ?? 0);
            $downPayment  = (int) ($request->down_payment ?? 0);
            $subTotal     = $totalPrice - $discount;
            $remaining    = $subTotal - $downPayment;

            $invoice = Invoice::create([
                'customer_id'           => $request->customer_id,
                'user_id'              => $request->user_id,
                'type'                 => $request->type,
                'price'                => $totalPrice,
                'discount'             => $discount,
                // ✅ konsisten: kolom di DB bernama downpayment (tanpa underscore)
                'down_payment'          => $downPayment,
                'total_price'          => $subTotal,
                'remaining_payment'    => $remaining,
                'status'               => $request->status ?? 'draft',
                'invoice_number'       => 'INV-' . now()->format('YmdHis'),
                'invoice_date'         => $request->invoice_date,
            ]);

            foreach ($request->products as $item) {
                $invoice->products()->attach(
                    $item['customer_product_id'],
                    ['price' => (int) $item['price']]
                );
            }

            DB::commit();
            return redirect()
                ->route('customer.index')
                ->with('success', 'Invoice berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan invoice: ' . $e->getMessage());
        }
    }

    public function show(Invoice $invoice)
    {
        $customer = Customer::with([
            'products',
            'products.product',
            'products.category',
            'products.categoryProduct'
        ])->findOrFail($invoice->customer_id);
        $invoice = Invoice::with('customer')->findOrFail($invoice->id);
        return view('invoice.show', compact('invoice', 'customer'));
    }

    public function edit($id)
    {
        $invoice = Invoice::with([
            'products', // relasi pivot
            'products.product',
            'products.category',
            'customer' // agar bisa ambil data customer
        ])->findOrFail($id);

        $customer = $invoice->customer;

        // Ambil semua product milik customer ini
        $customerProducts = CustomerProduct::with(['product', 'category'])
            ->where('customer_id', $customer->id)
            ->get();

        // Inject harga (pivot price) dari invoice ke dalam collection customerProducts
        foreach ($customerProducts as $prod) {
            $pivot = $invoice->products->firstWhere('id', $prod->id);
            if ($pivot) {
                $prod->pivot = $pivot->pivot; // inject pivot jika ada
            }
        }

        return view('invoice.edit', compact('invoice', 'customer', 'customerProducts'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_number' => 'required',
            'invoice_date'   => 'required|date',
            'type'           => 'required|in:cash,credit',
            'discount'       => 'nullable|numeric',
            'down_payment'   => 'nullable|numeric', // input form
            'status'         => 'required|in:unpaid,partial,paid',
            'products'       => 'required|array',
            // ✅ plural
            'products.*.customer__product_id' => 'required|exists:customer__products,id',
            'products.*.price' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            $invoice = Invoice::findOrFail($id);
            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_date'   => $request->invoice_date,
                'type'           => $request->type,
                'discount'       => $request->discount ?? 0,
                // ✅ simpan ke kolom `downpayment`
                'down_payment'    => $request->down_payment ?? 0,
                'status'         => $request->status,
            ]);

            // Sync ulang produk dengan harga
            $syncData = [];
            foreach ($request->products as $prod) {
                $syncData[$prod['customer__product_id']] = ['price' => (int) $prod['price']];
            }
            $invoice->products()->sync($syncData);

            // (opsional) hitung ulang total/remaining jika ingin konsisten setelah update:
            $totalPrice = $invoice->products()->sum('customer__product_invoice.price');
            $discount   = (int) ($invoice->discount ?? 0);
            $downPay    = (int) ($invoice->downpayment ?? 0);

            $invoice->update([
                'price'             => $totalPrice,
                'total_price'       => $totalPrice - $discount,
                'remaining_payment' => ($totalPrice - $discount) - $downPay,
            ]);

            DB::commit();
            return redirect()->route('invoice..index')->with('success', 'Invoice berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengupdate invoice: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Request $request, Invoice $invoice)
    {
        // Opsional: batasi penghapusan saat status tertentu
        if (in_array($invoice->status, ['paid'])) {
            return back()->with('error', 'Invoice yang sudah "paid" tidak boleh dihapus.');
        }

        $force = (bool) $request->query('force', false);

        try {
            DB::beginTransaction();

            // Lepas relasi pivot (invoice <-> customer__products)
            // aman walau tidak ada data pivot
            $invoice->products()->detach();

            // Soft delete (default) atau force delete (opsional)
            if ($force && method_exists($invoice, 'forceDelete')) {
                $invoice->forceDelete();
            } else {
                $invoice->delete();
            }

            DB::commit();
            return redirect()
                ->route('customer.index')
                ->with('success', 'Invoice berhasil dihapus.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus invoice: ' . $e->getMessage());
        }
    }


    public function download(Invoice $invoice)
    {
        $customer = Customer::with(['products.product','products.category'])
            ->findOrFail($invoice->customer_id);

        $pdf = Pdf::setPaper('A4','portrait')
            ->setOptions([
                'isRemoteEnabled' => true,
                'chroot' => public_path(), // aman; boleh dihapus jika tidak perlu
            ])
            ->loadView('invoice.pdf', [
                'invoice'  => $invoice,
                'customer' => $customer,
                'customerProduct' => $customer->products ?? collect(),
            ]);

        return $pdf->stream('invoice--'.($invoice->invoice_number ?? $invoice->id).'.pdf');
    }
}
