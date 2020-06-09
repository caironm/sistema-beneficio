<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/consultardadosbancario', 'BancariosController@index')->name('consultardadosbancarioto');
Route::get('/dadosbancario/ver/{beneficio}', 'BancariosController@show')->name('verdadosbancario');

Route::get('/consultarbeneficio', 'BeneficiosController@index')->name('consultarbeneficio');
Route::get('/beneficio/ver/{beneficio}', 'BeneficiosController@show')->name('verbeneficio');
