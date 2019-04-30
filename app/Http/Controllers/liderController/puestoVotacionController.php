<?php

namespace App\Http\Controllers\liderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class puestoVotacionController extends Controller
{
    //
    public function index()
    {
       
        $regiones = DB::table('regiones')->where('estado',true)->get();    
          
        return view('dashboard/lider/reglugarvotacion',compact('regiones'));
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
       
         $validarDatos= $request->validate([
            'lugarvotacion'=>'required|min:3',
            'direccion'=>'required|min:5',
            'municipio'=>'required', 
            'zona'=>'required',
            'comuna'=>'required',
           
        ]);

       DB::table('puesto_votacion')->insert(
            ['nombre_puesto' => $request->lugarvotacion, 'direccion' => $request->direccion, 
            'barrio_idbarrio' =>   $request->barrio , 'municipio_codmunicipio' =>  $request->municipio,
            'comuna_idcomuna' =>  $request->comuna,'fk_zona' =>  $request->zona
            ]
        );

        return back()->with('msj','El puesto de votación fue registrado corectamente');
    }
}
