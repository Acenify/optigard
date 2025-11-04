<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Customer;

class CustomerProduct extends Model
{
    protected $table = 'customer_product';

    protected $fillable = [
        'customer_id',
        'product_id',
        'category_product_id',
        'meters',
        'warantee_start',
        'warantee_end',
        'warantee_duration',

    ];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_product')
                    ->withPivot('price')
                    ->withTimestamps();
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function categoryProduct(){
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }
}
