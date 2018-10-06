<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['code','product_id', 'customer_name','customer_address','customer_mobile','total_price', 'status', 'user_id'];
}
