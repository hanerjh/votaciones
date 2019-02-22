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
    return view('login');
});


Route::resource('/ingresar','regpersonaController');
Route::get('/locationm/{id}','locationController@municipios');
Route::get('/locationd/{id}','locationController@departamentos');
Route::get('/locationpv/{id}','locationController@puestovotaciones');
Route::get('/locationmesas/{id}','locationController@mesas');

Route::get('/locationmpersona/{id}','locationController@municipios_persona');
Route::get('/locationcomunapersona/{id}','locationController@comunas_persona');