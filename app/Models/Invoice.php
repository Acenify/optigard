<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $fillable = [
        'customer_id', 'user_id',
        'type', 'price', 'discount', 'down_payment', 'total_price',
        'remaining_payment', 'status', 'invoice_number', 'invoice_date'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(CustomerProduct::class, 'invoice_product')
                    ->withPivot('price')
                    ->withTimestamps();
    }
}
