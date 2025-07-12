<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total', 'sub_total', 'payment_status', 'delivery_status', 'payment_type', 'delivery_type', 'payment_cost', 'delivery_cost','customer_name', 'customer_email', 'customer_phone', 'customer_address', 'customer_note'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
