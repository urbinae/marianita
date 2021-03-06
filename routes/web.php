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

//Web Store

Auth::routes();
Route::get('/', 'ViewController@index')->name('home');
Route::get('/methods', 'ViewController@methods')->name('methods');
Route::get('/transfer', 'ViewController@transfer')->name('transfer');

Route::get('/admin', 'HomeController@index')->name('admin');

Route::middleware(['auth'])->group(function () {
	//Tareas
	Route::resource('tareas', 'TodoController');
});
/*
Route::middleware(['cors'])->group(function () {
	//Mensajes
	Route::post('mensajes', 'MessageController@add_message');
});
*/

	Route::get('mensajes', 'MessageController@add_message');

//Route::post('/mensajes/create', 'MessageController@store')->name('addmessaje');
//Mensajes
Route::get('msns', 'MessageController@lista');

Route::get('instagram_maya', 'InstagramController@instagramMaya');

// Paypal

// Enviamos nuestro pedido a PayPal
//Route::post('donation','PayController@postDonation');

Route::post('donation', array(
	'as' => 'donation',
	'uses' => 'PayController@postDonation',
));
// Después de realizar el pago Paypal redirecciona a esta ruta
Route::get('donation/status', array(
	'as' => 'donation.status',
	'uses' => 'PayController@getDonationStatus',
));
