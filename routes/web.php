<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@index');

Route::get('/about', function () {
	
	// dd(\DB::table('CARRETA.ARTICULOS')->where('Descontinuado', 0)->get());
    return view('pages.about');
});

Route::get('/checkout', 'PaymentsController@checkout');

Route::group(['middleware'=>'auth'], function ()
{
	Route::get('/payment', 'PaymentsController@payment');
	Route::post('/purchase', 'PaymentsController@purchase');
	Route::post('/purchase-response', 'PaymentsController@purchaseResponse');
	Route::resource('orders', 'OrdersController');
});

Route::get('/products/{category}', 'ProductsController@index');
Route::get('/products/{category}/{category2}', 'ProductsController@index');
Route::get('/products/{category}/{category2}/{category3}', 'ProductsController@index');

Route::get('/products/{category}/{category2}/{category3}/{codigo}', 'ProductsController@show');
Route::resource('products', 'ProductsController');


Route::group(['as'=>'admin.','prefix' => 'admin', 'middleware'=>'authByRole:administrator'], function ()
{
	Route::get('/', [
		'as' => 'dashboard',
		'uses' => 'Admin\DashboardController@index'
		
	]);
	 # Users
    Route::get('users/register', [
        'as'   => 'user_register',
        'uses' => 'Admin\UsersController@create'
    ]);

    Route::post('users/register', [
        'as'   => 'user_register.store',
        'uses' => 'Admin\UsersController@store'
    ]);

    Route::resource('users', 'Admin\UsersController');

     Route::resource('orders', 'Admin\OrdersController');


});




Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

