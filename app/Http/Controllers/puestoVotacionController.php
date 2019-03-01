<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class puestoVotacionController extends Controller
{
    //
    public function index()
    {
       
        $regiones = DB::table('regiones')->where('estado',true)->get();       
        return view('dashboard/sbadmin/reglugarvotacion',compact('regiones'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrar(Request $request)
    {
      
        //$name=$request->all();
         //dd($name);
       

       DB::table('puesto_votacion')->insert(
            ['nombre' => $request->lugarvotacion, 'direccion' => $request->direccion, 
            'barrio_idbarrio' =>   $request->barrio , 'municipio_codmunicipio' =>  $request->municipio,
            'comuna_idcomuna' =>  $request->comuna
            ]
        );

        return "INFORMACION ALMACENADA";
    }
}
