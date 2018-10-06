<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','original_price','description','content', 'price', 'product_code','featured_image','slug'];
    public function productDetails(){
        return $this->hasMany('App\ProductDetail');
    }
    public function productGalleries(){
        return $this->hasMany('App\ProductGallery');
    }
    public function colors(){
        return $this->hasMany('App\Colors');
    }
}
