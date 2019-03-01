<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mesaVotacionController extends Controller
{
    //
    public function index()
    {
       
        $regiones = DB::table('regiones')->where('estado',true)->get();   
       
        return view('dashboard/sbadmin/regmesavotacion',compact('regiones'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrar(Request $request)
    {
      
       // $name=$request->all();
         //dd($name);
       

       DB::table('mesa')->insert(
            ['puesto_mesa' => $request->puesto, 'mesa' => $request->mesa ]
        );

        return "INFORMACION ALMACENADA";
    }
}
