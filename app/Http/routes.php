<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.index');
});
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
});

Route::get('/products/{category}', 'ProductsController@index');
Route::get('/products/{category}/{category2}', 'ProductsController@index');
Route::get('/products/{category}/{category2}/{category3}', 'ProductsController@index');

Route::get('/products/{category}/{category2}/{category3}/{codigo}', 'ProductsController@show');
Route::resource('products', 'ProductsController');



Route::group(['prefix' => 'admin', 'middleware'=>'authByRole:administrator'], function ()
{
	Route::get('/', [
		'as' => 'dashboard',
		'uses' => 'Admin\DashboardController@index'
		
	]);
});



Route::auth();

Route::get('/home', 'HomeController@index');
