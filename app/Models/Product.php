<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function categoryProduct()
    {
        return $this->hasMany(CategoryProduct::class, 'id', 'category_product_id');
    }
}
