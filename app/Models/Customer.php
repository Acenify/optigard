<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Invoice;
use App\Models\CustomerProduct;
use App\Models\CategoryProduct;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'branch_id', 'wsn', 'card_number', 'name', 'email',
        'phone_number', 'address', 'dealer_name', 'applicator',
        'city', 'country', 'warantee_start', 'warantee_end', 'warantee_duration'
    ];

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function products()
    {
        return $this->hasMany(CustomerProduct::class);
    }

    public function categoryProductBuildings(){
        return $this->hasMany(CategoryProduct::class);
    }

    public function customerProducts()
    {
        return $this->hasMany(CustomerProduct::class);
    }
}
