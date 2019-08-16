<?php
//PAGINA PRICIPAL DE LA APRICACION - FRONTEND

Route::get('/','generalController@noticias_web_principal');
Route::get('/noticia/{id}','generalController@desc_noticias');


Route::get('/locationmperson/{id}','locationController@municipios_persona');
Route::get('votacion','votacionController@index');
Route::post('confirmar_votacion','votacionController@eval_votacion')->name('confirmar_votacion');
Route::post('/cambiar_passwordinical','regpersonaController@changepassword');
Route::post('/registro','regpersonaController@registro_user_from_website')->name('registro');
Route::get('/recuperarcontrasena',function(){
    return view('resetpass');
});
Route::get('/registro',function(){
    return view('registro');
});

Route::get('inicio','Auth\LoginController@showLoginForm')->name('inicio');
Route::post('login','Auth\LoginController@login')->name('login');


// MIDDLEWARE QUE SOLO EVALUA SI HAY LOGIN Y COMPARTE LOS ENLACES ------------------------------------------------
Route::group(['middleware'=>'logincheck'], function(){ 
    Route::get('/puestos_por_zonas/{id}','reporteController@puestos_por_zonas');

    Route::get('/locationm/{id}','locationController@municipios');
    Route::get('/locationd/{id}','locationController@departamentos');
    Route::get('/locationz/{id}','locationController@zonas');
    Route::get('/locationpv/{id}','locationController@puestovotaciones');
    Route::get('/locationpuestos_votacion_generales/{id}','locationController@puestovotacionesgeneral');
    Route::get('/locationmesas/{id}','locationController@mesas');
    
    Route::get('/locationbarrio/{id}','locationController@barriosgeneral');
    
    Route::get('/locationmpersona/{id}','locationController@municipios_persona');
    Route::get('/locationcomunapersona/{id}','locationController@comunas_persona');
    // se evalua si el documento ingresado ya esta en la BD
    Route::get('/evaluardocumento/{id}','regpersonaController@eval_documento');
    });

//MIDDELWARE DE LIDERES------------------------------------------------------------------------
Route::group(['middleware'=>'checkuser'], function(){ 
    
    Route::get('/l_dashboard','liderController\reporteController@index')->name('dashboardlider');
    Route::get('/l_votosporzonas','liderController\reporteController@votos_por_zonas');   
    Route::get('/l_votosporpuestos','liderController\reporteController@votos_por_puestos');
    Route::get('/l_votospormesa','liderController\reporteController@votos_por_mesa');

    Route::get('/logout','Auth\LoginController@logout')->name('logout');
    //resetear passwor de un usuario 
    //Route::get('/l_form_password','liderController\regpersonaController@formchangepass');
    Route::post('/l_cambiar_password','liderController\regpersonaController@changepassword');
    //CAMBIAR MI CONTRASEÑA
    Route::get('/l_profilechange_password','liderController\regpersonaController@formchangeprofilepass');
    Route::post('/l_change_password','liderController\regpersonaController@changeprofilepassword');
    // CONSULTAS EN CONTROLADOR GENERAL
    Route::get('/l_usuarioslider/{id}','liderController\generalController@lider_usu_register');
    Route::get('/l_usuariosdeliderfaltantesporvotar/{id}','liderController\generalController@lider_usu_sin_votar');
    Route::get('/l_totalvotosfaltantes','liderController\generalController@usuarios_sin_votar');

//rutas para alideres
Route::get('/l_registrarlider','liderController\regliderController@index');
Route::post('/l_actualizarlider','liderController\regliderController@actualizar');
// REGISTRAR PUESTO
Route::get('/registrarpuestovotacion','liderController\puestoVotacionController@index');
Route::post('/registrarpuestovotacion','liderController\puestoVotacionController@registrar');
// REGISTRAR PUESTO
Route::get('/registrarmesa','liderController\mesaVotacionController@index');
Route::post('/registrarmesa','liderController\mesaVotacionController@registrar');

Route::resource('/l_usuario','liderController\regpersonaController');



//REPORTES
Route::get('reportes/','liderController\reporteController@index');
});


//MIDDELWARE DE ADMINISTRADOR--------------------------------------------------------------------------------------------

Route::group(['middleware'=>'adminlogin'], function(){ 
  

    Route::get('/dashboard','reporteController@index')->name('dashboard');
    Route::get('/votosporzonas','reporteController@votos_por_zonas');
    Route::get('/listadelideres','reporteController@total_lideres');
    Route::get('/registroweb','reporteController@registro_via_web');
    Route::get('/votosporpuestos','reporteController@votos_por_puestos');
    Route::get('/votospormesa','reporteController@votos_por_mesa');

    //reportes pervios
    Route::get('/votosprev_puestos','reporteController@cant_votos_previos_por_puestos');
    Route::get('/votosprev_mesa','reporteController@cant_votos_previos_por_mesa');
    Route::get('/votosprev_zona','reporteController@cant_votos_previos_por_zona');

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


   //SECCION DE CAMPAÑAS
   Route::get('/campaña','campannaController@form_regcampaña');
   Route::post('/campaña','campannaController@insert_regcampaña');

//rutas para alideres
Route::get('/registrarlider','regliderController@index');
Route::post('/actualizarlider','regliderController@actualizar');
// REGISTRAR PUESTO
Route::get('/registrarpuestovotacion','puestoVotacionController@index');
Route::post('/registrarpuestovotacion','puestoVotacionController@registrar');
// REGISTRAR PUESTO
Route::get('/registrarmesa','mesaVotacionController@index');
Route::post('/registrarmesa','mesaVotacionController@registrar');

Route::resource('/usuario','regpersonaController');
//Route::resource('/editarusuario','regpersonaController');
//Route::resource('/actualizarusuarioedit','regpersonaController');

//REPORTES
Route::get('reportes/','reporteController@index');

//NOTICIAS 
Route::resource('/noticias','NoticiaController');

});

