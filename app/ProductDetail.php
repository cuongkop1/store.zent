<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['product_id','quantity', 'product_detail_image','color_id','size_id'];
    public function product(){
        return $this->belongsTo('App\Product', 'product_id','id' );
    }
    public function color(){
        return $this->hasMany('App\Color');
    }
    public function size(){
        return $this->hasMany('App\Size');
    }
}
