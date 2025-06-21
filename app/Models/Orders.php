<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['total', 'payment_status', 'delivery_status', 'payment_type', 'customer_name', 'customer_email', 'customer_phone', 'customer_address', 'customer_note'];
}
