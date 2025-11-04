<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    protected $fillable = [
        'customer_id',
        'product_id',
        'category_product_id',
        'meters',
        'warantee_start',
        'warantee_end',
        'warantee_duration',
    ];
}
