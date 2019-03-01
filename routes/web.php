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

Route::get('/dashboard', function () {
    return view('dashboard.sbadmin.dash');
});

//rutas para alideres
Route::get('/registrarlider','regliderController@index');
Route::post('/actualizarlider','regliderController@actualizar');
// REGISTRAR PUESTO
Route::get('/registrarpuestovotacion','puestoVotacionController@index');
Route::post('/registrarpuestovotacion','puestoVotacionController@registrar');
// REGISTRAR PUESTO
Route::get('/registrarmesa','mesaVotacionController@index');
Route::post('/registrarmesa','mesaVotacionController@registrar');

Route::resource('/ingresar','regpersonaController');

Route::get('/locationm/{id}','locationController@municipios');
Route::get('/locationd/{id}','locationController@departamentos');
Route::get('/locationpv/{id}','locationController@puestovotaciones');
Route::get('/locationpuestos_votacion_generales/{id}','locationController@puestovotacionesgeneral');
Route::get('/locationmesas/{id}','locationController@mesas');

Route::get('/locationbarrio/{id}','locationController@barriosgeneral');

Route::get('/locationmpersona/{id}','locationController@municipios_persona');
Route::get('/locationcomunapersona/{id}','locationController@comunas_persona');

// se evalua si el documento ingresado ya esta en la BD
Route::get('/evaluardocumento/{id}','regpersonaController@eval_documento');
