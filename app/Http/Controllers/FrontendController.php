<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function spesification()
    {
        return view('frontend.spesification.index');
    }
    public function gallery()
    {
        return view('frontend.gallery.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function warranty(Request $request)
    {
        $card = trim($request->get('card_number', ''));
        $customer = null;
        $invoice  = null;

        if ($card !== '') {
            $customer = Customer::with('invoice')
                ->where('card_number', $card)
                ->first();

            $invoice = $customer?->invoice; // bisa null kalau belum ada invoice
        }

        return view('frontend.warranty.index', compact('card', 'customer', 'invoice'));
    }

    public function showWarranty(Invoice $invoice){
        $customer = customer::with([
            'products',
            'customerProducts.product',
            'customerProducts.categoryProduct'
        ])->findOrFail($invoice->customer_id);
        $invoice = Invoice::with('customer')->findOrFail($invoice->id);

        return view('frontend.warranty.show', compact('invoice', 'customer'));
    }
}
