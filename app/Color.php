<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['code','name','slug'];
    public function product(){
        return $this->belongsTo('App\Product' );
    }
    public function productDetails(){
        return $this->belongsTo('App\ProductDetail' );
    }
}
