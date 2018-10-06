<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//hoi cach truyen slug color
Route::get('/', 'IndexController@index');

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/welcome', function(){
	return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){
	// Auth::routes();
	// Route::get('/home', 'HomeController@index')->name('home');
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

	// Registration Routes...
	Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'Admin\RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'Admin\ResetPasswordController@reset');

	Route::middleware('admin.auth')->group(function(){
		Route::get('/dashboard', 'AdminController@index')->name('admin.home');
		// Route::get('post', function(){
		// });
		Route::prefix('user')->group(function(){
			Route::get('/',function(){
				return view('admin.user.list');
			});
			Route::get('/list', 'UserController@getList');
			Route::get('/add', 'UserController@create');
			Route::get('/{id}','UserController@show');
			Route::delete('/{id}', 'UserController@destroy');
			Route::get('/{id}/edit', 'UserController@edit');
			Route::put('/{id}','UserController@update');
			Route::post('/store', 'UserController@store');
		});
		Route::prefix('admin')->group(function(){
			Route::get('/',function(){
				return view('admin.user.list');
			});
			Route::get('/list', 'UserController@getList');
			Route::get('/add', 'UserController@create');
			Route::get('/{id}','UserController@show');
			Route::delete('/{id}', 'UserController@destroy');
			Route::get('/{id}/edit', 'UserController@edit');
			Route::put('/{id}','UserController@update');
			Route::post('/store', 'UserController@store');
		});
		Route::prefix('product')->group(function(){
			Route::get('/',function(){
				return view('admin.product.index');
			});
			// Route::get('/', 'ProductController@index');
			Route::get('/list', 'ProductController@getList');
			Route::get('/add', 'ProductController@create');
			Route::get('/{id}','ProductController@show');
			Route::delete('/{id}', 'ProductController@destroy');
			Route::get('/{id}/edit', 'ProductController@edit');
			Route::put('/{id}','ProductController@update');
			Route::post('/store', 'ProductController@store');
			Route::get('images/{id}', 'ProductController@showImages');
    		Route::delete('images/{id}', 'ProductController@destroyImages');
    		Route::post('images/{id}', 'ProductController@storeImages');
    		// Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');
		});
		Route::prefix('promotion')->group(function(){
			Route::get('/', function(){
				return view('admin.promotion.index');
			});
			Route::get('/add', 'PromotionController@create');
			Route::get('/list', 'PromotionController@getList');
			Route::get('/{id}','PromotionController@show');
			Route::delete('/{id}', 'PromotionController@destroy');
			Route::get('/{id}/edit', 'PromotionController@edit');
			Route::put('/{id}','PromotionController@update');
			Route::post('/store', 'PromotionController@store');
		});
		Route::prefix('order')->group(function(){
			Route::get('/', function(){
				return view('admin.order.index');
			});
			Route::get('/add', 'OrderController@create');
			Route::get('/list', 'OrderController@getList');
			Route::get('/{id}','OrderController@show');
			Route::delete('/{id}', 'OrderController@destroy');
			Route::get('/{id}/edit', 'OrderController@edit');
			Route::put('/{id}','OrderController@update');
			Route::post('/store', 'OrderController@store');
		});
		Route::prefix('product-detail')->group(function(){
			Route::get('/', function(){
				return view('admin.productDetail.index');
			});
			Route::get('/add', 'ProductDetailController@create');
			Route::get('{id}/add', 'ProductController@createDetail');
			Route::get('/list', 'ProductDetailController@getList');
			// Route::get('/detailpage/{id}', 'ProductDetailController@getDetailProduct');
			// Route::get('/{id}/show','ProductDetailController@show')->name('detail.show');
			Route::get('/{id}/list','ProductController@showDetail')->name('detail.list');
			Route::delete('/{id}', 'ProductDetailController@destroy');
			Route::get('/{id}/edit', 'ProductDetailController@edit');
			Route::get('/{id}', 'ProductDetailController@show');
			Route::put('/{id}','ProductDetailController@update');
			Route::post('/store', 'ProductDetailController@store');
		});
		Route::prefix('product-gallery')->group(function(){
			Route::get('/', function(){
				return view('admin.productGallery.index');
			});
			Route::get('/add', 'ProductGalleryController@create');
			Route::get('/list', 'ProductGalleryController@getList');
			Route::get('/{id}','ProductGalleryController@show');
			Route::delete('/{id}', 'ProductGalleryController@destroy');
			Route::get('/{id}/edit', 'ProductGalleryController@edit');
			Route::put('/{id}','ProductGalleryController@update');
			// Route::post('/store', 'ProductGalleryController@store');
			Route::post('/image-view', 'ProductGalleryController@store');
		});
		Route::prefix('order-detail')->group(function(){
			Route::get('/', function(){
				return view('admin.orderDetail.index');
			});
			Route::get('/add', 'OrderDetailController@create');
			Route::get('/list', 'OrderDetailController@getList');
			Route::get('/{id}','OrderDetailController@show');
			Route::delete('/{id}', 'OrderDetailController@destroy');
			Route::get('/{id}/edit', 'OrderDetailController@edit');
			Route::put('/{id}','OrderDetailController@update');
			Route::post('/store', 'OrderDetailController@store');
		});
		Route::prefix('color')->group(function(){
			Route::get('/', function(){
				return view('admin.color.index');
			});
			Route::get('/add', 'ColorController@create');
			Route::get('/list', 'ColorController@getList');
			Route::get('/{id}','ColorController@show');
			Route::delete('/{id}', 'ColorController@destroy');
			Route::get('/{id}/edit', 'ColorController@edit');
			Route::put('/{id}','ColorController@update');
			Route::post('/store', 'ColorController@store');
		});
	});
});

Route::get('/cart','IndexController@CartView');
Route::get('/check-out','IndexController@CheckOut');
Route::get('/getsize/{color_id}/{product_id}','IndexController@GetSizeByColor');
Route::get('/getquantity/{product_id}/{color_id}/{size_id}','IndexController@GetQuantity');
Route::post('/check-out/store','IndexController@store');
Route::post('/cart/minus','IndexController@Minus');
Route::post('/cart/plus','IndexController@Plus');
Route::post('/cart/{id}','IndexController@addToCart');
Route::get('/quick/{id}','IndexController@QuickView');
// Route::get('/cart/add-to-cart/{id}','IndexController@testcart');
Route::get('cart/delete/{id}','IndexController@DeleteProduct');
Route::get('/{slug}', 'IndexController@ViewProduct');

