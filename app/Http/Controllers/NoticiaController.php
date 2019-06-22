<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
       return view('dashboard/sbadmin/regnoticia');
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
        //SI hay un archivo en el envio del formulario
        if($request->hasFile('archivo')){
              /*  $file=$request->file('archico');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/images/',$name);
                return $name;*/


            $file = $request->file('archivo');
            $name = time().$file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $name);
        }
        $id_session_user=$request->session()->get('iduser');
        DB::table('noticia')->insert(
            ['titulo' => $request->titulo, 'contenido' => $request->contenido, 'imagen' => $name, 'fkidpersona'=>$id_session_user ]
        );
        //'idpersonalider'=>$id_session_user
        return "INFORMACION ALMACENADA";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
