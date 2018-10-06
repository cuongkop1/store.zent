<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Color;
use App\Size;
use App\Product;
use App\ProductDetail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('colors')){
            View::share('colors', Color::all());
        }
        if(Schema::hasTable('sizes')){
            View::share('sizes', Size::all());
        }
        if(Schema::hasTable('products')){
            View::share('products', Product::all());
        }
        if(Schema::hasTable('product_details')){
            View::share('details', ProductDetail::all());
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
