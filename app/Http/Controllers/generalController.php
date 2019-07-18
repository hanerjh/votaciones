<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class generalController extends Controller
{

    public function noticias_web_principal(){

        $noticias=DB::table('noticia')
        ->orderBy('fecha_publicacion','desc')
        ->limit(3)
        ->get(); 
        
       return view('paginaprincipal',compact('noticias'));
    }


    public function desc_noticias($id){
       
        $noticias=DB::table('noticia')
        ->where('idnoticia',$id)       
        ->first(); 
        
        if($noticias=="" || $noticias==null){
            return "No ha informacion";
        }
        else{
            return view('descnoticia',compact('noticias'));
        }
       
    }
    
    //ESTA FUNCION SE EJECUTAC CUANDO DESDE EL DASHBOARD SE DA CLICK EN CADA ENLACE DE CANDIDATOS
    public function lider_usu_register($id){
        
        //USUARIOS REGITRADO POR CADA LIDER
      $usu_reg_by_lider=DB::table("persona as lider")
        ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
        ->join('puesto_votacion as puesto','puesto.idpuesto_votacion','=','usuario.fkpuesto_votacion')
        ->join('mesa','idmesa','=','usuario.fk_mesa')
        ->where('lider.idpersona',$id)                         
        ->select('lider.nombre as lider','usuario.nombre','usuario.apellido','usuario.telefono','puesto.nombre_puesto','mesa.mesa')
        ->get();

        if(session()->get('tipousu')===2){
        return view('dashboard.adminlider.usuarioreglider',compact('usu_reg_by_lider'));
        }
        elseif(session()->get('tipousu')===3){
            return view('dashboard.sbadmin.usuarioreglider',compact('usu_reg_by_lider'));
            }
    

       
               


        //dd($usu_reg_by_lider);
    }
    //USUARIOS REGISTRADSÇOS POR LIDER QUE HACEN FALTA POR VOTAR
    public function lider_usu_sin_votar($id){

        $usu_reg_by_lider=DB::table("persona as lider")
        ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
        ->join('puesto_votacion as puesto','puesto.idpuesto_votacion','=','usuario.fkpuesto_votacion')
        ->join('mesa','idmesa','=','usuario.fk_mesa')  
        ->where('lider.idpersona',$id)       
        ->whereNotIn('usuario.idpersona',function($query){
                            $query->select('persona_idpersona')
                            ->from('persona_has_campanna as votacion')
                            ->where('campanna_idcampanna','=',function($query){
                                $query->select('idcampanna')
                                ->from('campanna')
                                ->where('estado',0)
                                ->orderBy('idcampanna','desc')
                                  ->limit(1)       
                                  ->get();

                      });
            })                                     
        ->select('lider.nombre as lider','usuario.nombre','usuario.apellido','usuario.telefono','puesto.nombre_puesto','mesa.mesa')
        ->get();  
        return view('dashboard.sbadmin.usuarioreglider',compact('usu_reg_by_lider'));
    }
    //TODOS LOS USUARIOS QUE NO HAN VOTADO AUN
    public function usuarios_sin_votar(){
        $usu_reg_by_lider=DB::table("persona as lider")
        ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
        ->leftJoin('puesto_votacion as puesto','puesto.idpuesto_votacion','=','usuario.fkpuesto_votacion')
        ->leftJoin('mesa','idmesa','=','usuario.fk_mesa') 
        ->whereNotIn('usuario.idpersona',function($query){
                            $query->select('persona_idpersona')
                            ->from('persona_has_campanna as votacion')
                            ->where('campanna_idcampanna','=',function($query){
                                $query->select('idcampanna')
                                ->from('campanna')
                                ->where('estado',0)
                                ->orderBy('idcampanna','desc')
                                  ->limit(1)       
                                  ->get();

                      });
            })                                     
        ->select('lider.nombre as lider','lider.apellido as apellidolider','usuario.idpersona','usuario.nombre','usuario.apellido','usuario.telefono','puesto.nombre_puesto','mesa.mesa')
        ->get();
        return view('dashboard.sbadmin.totalvotosfaltantes',compact('usu_reg_by_lider'));
    }

   
}
