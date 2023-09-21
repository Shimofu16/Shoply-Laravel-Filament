<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'order_number',
        'total_amount',
        'discount_amount',
        'tax_amount',
        'shipping_amount',
        'grand_total',
        'status',
        'payment_method',
        'payment_status',
        'payment_reference',
        'payment_url',
        'shipping_method',
        'notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
