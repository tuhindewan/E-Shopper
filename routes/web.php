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

/*Frontend routes*/
Route::get('/', 'HomeController@index');

/*Show products by category name*/
Route::get('/product_by_category/{category_id}','HomeController@product_by_category');
/*Show products by manufacture name*/
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@product_by_manufacture');
Route::get('/product_details/{product_id}','ProductController@product_details');

/*Cart Routes*/
Route::post('/add_to_cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete-cart-item/{rowId}','CartController@delete_cart_item');
Route::post('/update_cart_item','CartController@update_cart_item');

/*checkout Routes*/
Route::get('/user_login_check','CheckoutController@user_login_check');
Route::post('/customer_registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_shipping_details','CheckoutController@save_shipping_details');
Route::get('/payment','CheckoutController@payment');
Route::post('/save_payment_gateway','CheckoutController@save_payment_gateway');


/*Customer auth routes*/
Route::get('/customer_logout','CheckoutController@customer_logout');
Route::post('/customer_login','CheckoutController@customer_login');

/*Backend Routes*/
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@admin_login');
Route::get('/logout','SuperAdminController@logout');

/*Manage order routes*/
Route::get('/manage_order','CheckoutController@manage_order');


/*Category Routes*/
Route::get('/add_category','CategoryController@index');
Route::get('/all_category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit_category/{category_id}','CategoryController@edit_category');
Route::post('/update_category/{category_id}','CategoryController@update_category');
Route::get('/delete_category/{category_id}','CategoryController@delete_category');
Route::get('/inactive_category/{category_id}','CategoryController@inactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');


/*Manufacture Route*/
Route::get('/add_manufacture','ManufactureController@add_manufacture');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/all_manufacture','ManufactureController@all_manufacture');
Route::get('/inactive_manufacture/{manufacture_id}','ManufactureController@inactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/edit_manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update_manufacture/{manufacture_id}','ManufactureController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}','ManufactureController@delete_manufacture');



/*Product Routes*/
Route::get('/add_product','ProductController@add_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/all_product','ProductController@all_product');
Route::get('/inactive_product/{product_id}','ProductController@inactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');


/*Slider Routes*/
Route::get('/add_slider','SliderController@add_slider');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all_slider','SliderController@all_slider');

