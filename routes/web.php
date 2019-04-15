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
Route::get('votacion','votacionController@index');
Route::post('confirmar_votacion','votacionController@eval_votacion')->name('confirmar_votacion');
Route::post('/cambiar_passwordinical','regpersonaController@changepassword');
Route::get('/recuperarcontrasena',function(){
    return view('resetpass');
});

Route::get('inicio','Auth\LoginController@showLoginForm')->name('inicio');
Route::post('login','Auth\LoginController@login')->name('login');

Route::group(['middleware'=>'checkuser'], function(){  

    
    Route::get('/dashboard','reporteController@index')->name('dashboard');
    Route::get('/votosporzonas','reporteController@votos_por_zonas');
    Route::get('/listadelideres','reporteController@total_lideres');
    Route::get('/registroweb','reporteController@registro_via_web');
    Route::get('/votosporpuestos','reporteController@votos_por_puestos');
    Route::get('/votospormesa','reporteController@votos_por_mesa');

    Route::get('/logout','Auth\LoginController@logout')->name('logout');
    //resetear passwor de un usuario 
    Route::get('/form_password','regpersonaController@formchangepass');
    Route::post('/cambiar_password','regpersonaController@changepassword');
    //CAMBIAR MI CONTRASEÑA
    Route::get('/profilechange_password','regpersonaController@formchangeprofilepass');
    Route::post('/change_password','regpersonaController@changeprofilepassword');
    // CONSULTAS EN CONTROLADOR GENERAL
    Route::get('/usuarioslider/{id}','generalController@lider_usu_register');
    Route::get('/usuariosdeliderfaltantesporvotar/{id}','generalController@lider_usu_sin_votar');
    Route::get('/totalvotosfaltantes','generalController@usuarios_sin_votar');

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

//REPORTES
Route::get('reportes/','reporteController@index');
});


