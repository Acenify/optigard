<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Branch;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\CustomerProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index(Request $request){
         $query = Customer::query();

        // Filter berdasarkan keyword pencarian (nama)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ambil data customer dengan paginasi
        $customers = $query->latest()->paginate(10);
        return view('customer.index', compact('customers'));
    }

    public function create(){
        $categories = CategoryProduct::all();
        $products = Product::all();
        return view('customer.create', compact('categories', 'products'));
    }


public function store(Request $request)
{
    // WAJIB: pastikan route ini di-protect middleware('auth')
    // Route::middleware('auth')->post('customer', [CustomerController::class, 'store'])->name('customer.store');

    $request->validate([
        'wsn'          => 'required|string',
        'name'         => 'required|string',
        'phone_number' => 'required|string',
        'email'        => 'nullable|email',
        'address'      => 'nullable|string',
        'dealer_name'  => 'nullable|string',
        'applicator'   => 'nullable|string',
        'city'         => 'nullable|string',
        'country'      => 'nullable|string',

        'products'                       => 'required|array|min:1',
        'products.*.category_product_id' => ['required', 'integer', Rule::exists('category_product', 'id')], // tabel singular sesuai DB Anda
        'products.*.product_id'          => ['required', 'integer', Rule::exists('product', 'id')],          // tabel singular sesuai DB Anda
        'products.*.meters'              => 'required|numeric|min:0.01',
        'products.*.warantee_duration'   => 'required|integer|in:3,5,7',

        // Validasi password user yang sedang login
        'admin_password' => ['required', 'current_password'], // gunakan guard default 'web'
    ]);

    $user = Auth::user(); // dijamin ada karena middleware auth

    // === Generate nomor kartu otomatis: OPT-YYYY-000001 ===
    $last = Customer::orderByDesc('id')->value('card_number');
    $seq  = 1;
    if ($last && preg_match('/^OPT-\d{4}-(\d{6})$/', $last, $m)) {
        $seq = (int) $m[1] + 1;
    }
    $cardNumber = sprintf('OPT-%s-%06d', now()->format('Y'), $seq);

    // Ambil satu branch_id milik user jika ada; fallback ke 1

    DB::beginTransaction();
    try {
        $customer = Customer::create([
            'wsn'          => $request->wsn,
            'card_number'  => $cardNumber,
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'address'      => $request->address,
            'dealer_name'  => $request->dealer_name,
            'applicator'   => $request->applicator,
            'city'         => $request->city,
            'country'      => $request->country,
        ]);

        foreach ($request->input('products', []) as $row) {
            $duration = (int) $row['warantee_duration'];
            CustomerProduct::create([
                'customer_id'         => $customer->id,
                'category_product_id' => (int) $row['category_product_id'],
                'product_id'          => (int) $row['product_id'],
                'meters'              => (float) $row['meters'],
                'warantee_duration'   => $duration,
                'warantee_start'      => now(),
                'warantee_end'        => now()->copy()->addYears($duration),
            ]);
        }

        DB::commit();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan.');
    } catch (\Throwable $e) {
        DB::rollBack();
        return back()->withInput()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
    }
}


    public function edit(Customer $customer)
    {
        $categories = CategoryProduct::all();
        $products = Product::all();
        $customer->load('products.category', 'products.product');

        return view('customer..edit', compact('customer', 'categories', 'products'));
    }


    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'wsn' => 'required|string',
            'card_number' => 'required|string',
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'dealer_name' => 'nullable|string',
            'applicator' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'products' => 'required|array|min:1',
            'products.*.id' => 'nullable|exists:customer_product,id',
            'products.*.category_product_id' => 'required|exists:category_product,id',
            'products.*.product_id' => 'required|exists:product,id',
            'products.*.meters' => 'required|numeric',
            'products.*.warantee_duration' => 'required|integer',
            'admin_password' => 'required|string',
        ]);

        if (!Hash::check($request->admin_password, auth()->user()->password)) {
            return back()->with('error', 'Password admin salah.');
        }

        DB::beginTransaction();
        try {
            // Update data customer
            $customer->update([
                'wsn' => $request->wsn,
                'card_number' => $request->card_number,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'dealer_name' => $request->dealer_name,
                'applicator' => $request->applicator,
                'city' => $request->city,
                'country' => $request->country,
            ]);

            // Update data produk
            $existingIds = [];
            foreach ($request->products as $product) {
                $duration = (int) $product['warantee_duration'];
                $data = [
                    'customer_id' => $customer->id,
                    'category_product_id' => $product['category_product_id'],
                    'product_id' => $product['product_id'],
                    'meters' => $product['meters'],
                    'warantee_duration' => $duration,
                    'warantee_start' => now(),
                    'warantee_end' => now()->addYears($duration),
                ];

                if (!empty($product['id'])) {
                    $cbProduct = CustomerProduct::find($product['id']);
                    $cbProduct->update($data);
                    $existingIds[] = $cbProduct->id;
                } else {
                    $new = CustomerProduct::create($data);
                    $existingIds[] = $new->id;
                }
            }

            // Hapus produk yang dihapus dari form
            $customer->products()->whereNotIn('id', $existingIds)->delete();

            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


     public function getProductsByCategory($id)
    {
        $products = Product::where('category_product_id', $id)->get();
        return response()->json($products);
    }

    public function destroy(Customer $customer)
    {
        DB::transaction(function () use ($customer) {
            $customer->products()->delete();
            $customer->delete();
        });

        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('selected', []);
        if (!empty($ids)) {
            DB::transaction(function () use ($ids) {
                CustomerProduct::whereIn('customer_id', $ids)->delete();
                Customer::whereIn('id', $ids)->delete();
            });
        }
        return redirect()->route('customer.index')->with('success', 'Data berhasil dihapus.');
    }
}
