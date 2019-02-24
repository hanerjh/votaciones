<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class regpersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = DB::table('regiones')->where('estado',true)->get();
        $departamentos = DB::table('departamentos')->get();
        $municipios = DB::table('municipio')->get();  

        return view('dashboard/sbadmin/index',compact('regiones','departamentos','municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$name = $request->input('municipio');
        //$name2 = $request->input('mesa');
        $name=$request->all();

    
        
     dd($name);
       

      /*  DB::table('persona')->insert(
            ['documento' => $request->documento, 'nombre' => $request->nombre, 
            'apellido' =>   $request->apellido , 'fechaNacimiento' =>  $request->fechaNacimiento,
            'sexo' =>  $request->genero , 'correo' => $request->email, 'telefono' => $request->telefono,
             'comuna' =>   $request->comuna, 'barrio' => $request->barrio,
            'direccion' => $request->direccion, 'fkpuesto_votacion' => $request->puesto, 'fk_mesa' => $request->mesa,
            'municipio' =>$request->municipio
            ]
        );*/

        //return "INFORMACION ALMACENADA";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosmunicipio = DB::table('municipio')->leftJoin('departamentos', 
        'municipio.departamentos_coddepartamentos', '=', 'departamentos.coddepartamentos')
        ->where('municipio.departamentos_coddepartamentos',"=",$id)
        ->select('codmunicipio', 'municipio')
        ->get();
       return $datosmunicipio;
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eval_documento($id)
    {
        $documento = DB::table('persona')
        ->where('documento',"=",$id)
        ->select('documento', 'nombre')
        ->get();
       
       return $documento;
    }

}
