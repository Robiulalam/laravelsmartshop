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

Route::get('/','WelcomeController@index');
Route::get('/categoryview/{id}','WelcomeController@category');
Route::get('/product-details/{id}','WelcomeController@productDetails');


Route::post('/add-to-cart','CartController@index');
Route::get('/show-cart','CartController@cartView');
Route::post('/update-cart','CartController@updateCart');
Route::get('/remove-cart-product/{rowId}','CartController@removeCart');


Route::get('/checkout','CheckoutController@index');
Route::post('/new-customer','CheckoutController@newCustomer');
Route::get('/shipping-info','CheckoutController@shippingInfo');
Route::get('/user-logout','CheckoutController@userLogout');
Route::post('/new-shipping','CheckoutController@newShipping');
Route::get('/payment-info','CheckoutController@paymentInfo');

Route::post('/new-order','CheckoutController@saveOrderInfo');
Route::get('/customer-home','CheckoutController@customerHome');
Route::post('/user-login','CheckoutController@userLogin');





Route::get('/manage-order','OrderController@index');








Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

		

 // Route::group(['middleware'=>'AuthenticateMiddleware'],function(){



// category info start
Route::group(['prefix'=>'category'],function(){

Route::get('/add','CategoryController@createCategory');
Route::post('/save','CategoryController@storeCategory');
Route::get('/manage','CategoryController@manageCategory');
Route::get('/edit/{id}','CategoryController@editCategory');
Route::post('/update','CategoryController@updateCategory');
Route::get('/delete/{id}','CategoryController@deleteCategory');

 });
// category info end


// Manufacturer info start
Route::group(['prefix'=>'manufacturer'],function(){


Route::get('/add','ManufacturerController@createManufacturer');
Route::post('/save','ManufacturerController@storeManufacturer');
Route::get('/manage','ManufacturerController@manageManufacturer');
Route::get('/edit/{id}','ManufacturerController@editManufacturer');
Route::post('/update','ManufacturerController@updateManufacturer');
Route::get('/delete/{id}','ManufacturerController@deleteManufacturer');

});

// Manufacturer info end

// Product info start
Route::group(['prefix'=>'product'],function(){

Route::get('/add','ProductController@createProduct');
Route::post('/save','ProductController@storeProduct');
Route::get('/manage','ProductController@manageProduct');
Route::get('/view/{id}','ProductController@viewProduct');
Route::get('/edit/{id}','ProductController@editProduct');
Route::post('/update','ProductController@updateProduct');
Route::get('/delete/{id}','ProductController@deleteProduct');

});
// Product info end


  // });

