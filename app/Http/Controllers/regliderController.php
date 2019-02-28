<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class regliderController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $personas = DB::table('persona')
        ->join('tipousuario','idtipousuario','=','persona.fktipousuario')      
        ->get();     

        $tpusuario=DB::table('tipousuario')->get();
      
       
        return view('dashboard/sbadmin/reglider',compact('personas','tpusuario'));
    }

      /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        DB::table('persona')
            ->where('idpersona', $request->pk)
            ->update([$request->name => $request->value]);

       return response()->json(['success'=>'done']);
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

}
