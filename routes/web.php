<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InvoiceController;

Route::get('/', [FrontendController::class, 'index'])->name('home.index');
Route::get('/spesification', [FrontendController::class, 'spesification'])->name('spesification.index');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery.index');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact.index');
Route::get('/warranty', [FrontendController::class, 'warranty'])->name('warranty.index');
Route::get('/warranty/show/{invoice}', [FrontendController::class, 'showWarranty'])->name('warranty.show');


Route::get('/login', [LoginController::class, 'index'])->name('index.login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware('auth')->group( function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::delete('customer/bulk-delete', [CustomerController::class, 'bulkDelete'])->name('customer.bulkDelete');
    Route::get('/products-by-category/{id}', [CustomerController::class, 'getProductsByCategory']);

    Route::get('/invoice/create/{customer}', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::put('/invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::get('/invoice/{invoice}/download', [InvoiceController::class, 'download'])->name('invoice.download');
    Route::delete('/invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');

});

Route::get('/pdf-test', function () {
    $pdf = Pdf::loadHtml('<h1>HELLO PDF</h1>');
    return $pdf->stream('test.pdf');
});
