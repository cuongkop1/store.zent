<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['product_detail_id','order_id', 'price', 'quantity'];
}
