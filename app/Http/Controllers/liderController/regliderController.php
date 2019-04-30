<?php

namespace App\Http\Controllers\liderController;

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
       
        /*$personas = DB::table('persona')
        ->join('tipousuario','idtipousuario','=','persona.fktipousuario')      
        ->get();*/
        //OBTENEMOS EL ID DEL USUARIO LOGUEADO
        $id=session()->get('iduser');

        $personas=DB::table("persona as lider")
        ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
        ->join('tipousuario','idtipousuario','=','usuario.fktipousuario') 
        ->join('puesto_votacion as puesto','puesto.idpuesto_votacion','=','usuario.fkpuesto_votacion')
        ->join('mesa','idmesa','=','usuario.fk_mesa')
        ->where('lider.idpersona',$id)   
        ->get();

       /* $personas = DB::table('persona')
        ->join('tipousuario','idtipousuario','=','persona.fktipousuario')    
        ->leftJoin('mesa','idmesa','=','persona.fk_mesa')
        ->leftJoin('puesto_votacion','idpuesto_votacion','=','mesa.puesto_mesa') 
        ->where('idtipousuario','<>',3) 
        ->get();  */   

        $tpusuario=DB::table('tipousuario')
                    ->where('idtipousuario','<>',3)
                    ->get();
      
      // dd($personas);
        return view('dashboard/lider/reglider',compact('personas','tpusuario'));
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

    public function changepassword(Request $request, $id)
    {
        
       
    }

}
