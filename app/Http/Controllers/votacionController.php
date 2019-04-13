<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
class votacionController extends Controller
{
    public function index(){
       // dd(Carbon::now());
        return view('votacion');
        
    }

    public function eval_votacion(Request $request)
    {
        $validarDatos= $request->validate([
            'documento'=>'required|min:5|max:16',            
        ]); 
        $documento=$request->documento;

        $dato="";
        $dato = DB::table('persona')
        ->select('nombre','idpersona','fkpuesto_votacion','fk_mesa')
        ->where('documento',"=", $documento)        
        ->first();
        
            //dd($dato);
        if(!empty($dato))
        {
            //buscamos el ultimo periodo de campaña y debe coincidir con el año actual y el estado activo de la campaña
            $vigencia_eleccion=DB::table('campanna')          
            ->orderBy('idcampanna','desc')
            ->select('ano','fecha_cierre','estado','idcampanna')
            ->limit(1)       
            ->first();

            $idcampaña=$vigencia_eleccion->idcampanna;
            $idpersona=$dato->idpersona;
            $mytime = Carbon::now();
            
            if(($vigencia_eleccion->ano == $mytime->year ) && ($vigencia_eleccion->estado==0 ))
            {
                    //CONSULTAMOS SI UN USUARIO YA VOTO EN LA CAMPAÑA ACTUAL YA QUE TRAEMOS EL IDCAMPAÑA VIGENTE EN LA CONSULTA ANTERIRO
                        $confimacion_voto=DB::table('persona_has_campanna')                         
                        ->select('campanna_idcampanna')
                        ->where([
                                    ['campanna_idcampanna','=',$idcampaña],
                                    ['persona_idpersona','=',$idpersona],
                               ])
                        ->orderBy('campanna_idcampanna','desc')
                        ->limit(1)       
                        ->first();

                       if(empty($confimacion_voto))
                       {

                       // REGISTRO DEL VOTO DE CONFIRMACION
                        DB::table('persona_has_campanna')->insert(
                            ['campanna_idcampanna' => $vigencia_eleccion->idcampanna,
                              'persona_idpersona' => $dato->idpersona,
                              'voto' => 1,
                              'puesto' => $dato->fkpuesto_votacion,
                              'mesa' => $dato->fk_mesa,
                              'fecha' => Carbon::now()

                              ]
                        );
                           return back()->with("msjsuccess",$dato->nombre); 

                       }
                       else{
                        return back()->withErrors(['mensaje'=>'Ya esta registrado tu voto en el sistema. <br> te gradecemos amigo <strong>'.$dato->nombre.' </strong> por haber confiado en este movimiento']);
  
                       } 
            }
        }
        else
        {
            return back()->withErrors(['mensaje'=>'El documento ingresado no se encuentra registrado en el sistema. <br> Te invitamos a registrarte en el ssiguente enlace <a href="#">Registrese</a> ó contacte a un lider del movimiento para su registro']);
        }
       
      // return $documento;
    }
}
