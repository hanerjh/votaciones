<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class campannaController extends Controller
{
    //
    public function form_regcampaña(){
        $tipoelecciones=DB::table('tipo_eleccion')->get();
        return view("dashboard.sbadmin.campaña",compact("tipoelecciones"));

    }

    public function insert_regcampaña(Request $request){

        $validarDatos= $request->validate([
            'campaña'=>'required|min:3',
            'año'=>'required|min:4',
            'fecha'=>'required', 
            'tipoeleccion'=>'required'
           
        ]);

        DB::table('campanna')->insert(
            ['titulo' => $request->campaña, 'ano' => $request->año, 
            'fecha_cierre' =>   $request->fecha , 'fk_tipoeleccioin' =>  $request->tipoeleccion
            
            ]
        );

        return back()->with('msj','La campaña fue registrado correctamente');


    }
}
