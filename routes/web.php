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

Route::get('/', function () {
    return view('index');/*welcome*/
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); /*home*/

Route::get('/canchas', 'CanchaController@index');
Route::get('/canchas/form', 'CanchaController@form');
Route::get('/canchas/{id}', 'CanchaController@show');
Route::post('/canchas', 'CanchaController@create');

Route::get('/reserva', 'ReservaController@index');
Route::get('/reserva/form', 'ReservaController@form');
Route::post('/reserva', 'ReservaController@create');

Route::get('/contacto', 'contactoController@index');