<?php

namespace App\Http\Controllers\liderController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class reporteController extends Controller
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
        //TOTAL DE USUARIOS REGISTRADOS
        $cant_usu_registrado = DB::table('persona')->count();
        //TOTAL DE LIDERES REGISTRADOS
        $cant_lider_registrado=DB::table('persona')
                                ->where('fktipousuario','=',2)         
                                ->count();



        //ESTA CONSULTA TREA LOS USURIOS REGISTRADOS POR CADA LIDER
        //SELECT lider.idpersona, lider.nombre as lider, COUNT(usuario.idpersona) as cantidad FROM persona as lider LEFT JOIN persona as usuario on usuario.idpersonalider=lider.idpersona WHERE lider.fktipousuario=2 GROUP BY lider.nombre 
        $total_usu_reg_por_lideres=DB::table("persona as lider")
                        ->leftJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')  
                        ->where('lider.fktipousuario',2)                                             
                        ->select('lider.idpersona as id','lider.nombre as lider',DB::raw('COUNT(usuario.idpersona) as cantidad'))
                        ->groupBy('lider.nombre','lider.idpersona')
                        ->orderBy('cantidad','desc')
                        ->get();

                     // $tlideres= json_encode($total_usu_reg_por_lideres);
                   
        //ESTA CONSULTA TREA LOS USURIOS REGISTRADOS POR CADA LIDER
        $id_session_user= session('iduser');
            $usu_reg_lider=DB::table("persona as lider")
                            ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
                            ->where('lider.idpersona',$id_session_user)                         
                            ->select('lider.nombre as lider','usuario.nombre as usuario')
                            ->get();

        //CANTIDAD DE USUARIOS REGISTRADOS POR LIDERES
        $cant_usu_reg_lider=DB::table("persona as lider")
        ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
        ->where('lider.idpersona',$id_session_user)                         
        ->count();
       
        //CANTIDAD DE PUESTOS DE VOTACION POR ZONAS
        $total_puestos_zonas=DB::table("puesto_votacion as puesto")
        ->leftJoin('zona', 'puesto.fk_zona', '=', 'zona.idzona')  
        ->select('zona.zona','zona.idzona',DB::raw('COUNT(puesto.idpuesto_votacion) as cantidad'))
        ->groupBy('zona','idzona')
        ->get();

        // TOTAL DE VOTOS EN EL SISTEMA PARA LA ULTIMA CAMPAÑA

        $vigencia_eleccion=DB::table('campanna')  
        ->select('ano','fecha_cierre','estado','idcampanna')
        ->orderBy('idcampanna','desc')
        ->limit(1)       
        ->first();

        
        $total_votos=DB::table("persona_has_campanna as votacion") 
        ->where('campanna_idcampanna',$vigencia_eleccion->idcampanna)       
        ->count();

        //CANTIDAD VOTOS DE USUARIOS REGISTRADOS POR LIDERES
        $total_votos_usu_lider=DB::table("persona as lider")
        ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
        ->join('persona_has_campanna as votacion','usuario.idpersona','=','votacion.persona_idpersona')
        ->where('lider.idpersona',$id_session_user)                         
        ->count();

        $faltantes_votos= $cant_usu_reg_lider - $total_votos_usu_lider;

        //TOTAL DE USUARIOS POR VOTAR  
        $total_votos_faltantes=DB::table("persona as lider")
        ->rightJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')
        ->join('puesto_votacion as puesto','puesto.idpuesto_votacion','=','usuario.fkpuesto_votacion')
        ->join('mesa','idmesa','=','usuario.fk_mesa') 
        ->whereNotIn('usuario.idpersona',function($query){
                            $query->select('persona_idpersona')
                            ->from('persona_has_campanna as votacion')
                            ->where('campanna_idcampanna','=',function($query){
                                      $query->select('idcampanna')
                                      ->from('campanna')
                                      ->orderBy('idcampanna','desc')
                                        ->limit(1)       
                                        ->get();

                            });
            })                                                 
        ->count();
        //ARREGLAR EL 2 DE LA CAMPAÑA
        $voto_por_zonas= DB::table("persona_has_campanna as votacion")
        ->join('puesto_votacion','idpuesto_votacion','=','votacion.puesto')
        ->Join('zona','idzona','=','puesto_votacion.fk_zona') 
       ->where('campanna_idcampanna','=',function($query){
        $query->select('idcampanna')
        ->from('campanna')
        ->orderBy('idcampanna','desc')
          ->limit(1)       
          ->get();

        })   
       ->select('zona',DB::raw('count(votacion.puesto) as cantidad'))
       ->groupBy('zona')  
      ->get();

//dd( $votos_faltantes);
        //return $cant_usu_reg_lider;
        //return view('dashboard.lider.dash');
        

            return view('dashboard.lider.dash',compact('voto_por_zonas','regiones','departamentos','municipios','cant_usu_registrado','cant_lider_registrado','cant_usu_reg_lider','total_usu_reg_por_lideres','total_puestos_zonas','total_votos','total_votos_usu_lider','faltantes_votos', 'total_votos_faltantes'));

        
      

    }

    public function votos_por_zonas(){
       // VOTACIONES POR ZONAS
        $voto_por_zonas= DB::table("persona_has_campanna as votacion")
              ->join('puesto_votacion','idpuesto_votacion','=','votacion.puesto')
              ->join('zona','idzona','=','puesto_votacion.fk_zona') 
             ->where('campanna_idcampanna',2)   
             ->select('zona',DB::raw('count(votacion.puesto) as cantidad'))
             ->groupBy('zona')  
            ->get();

           
                    return view('dashboard.lider.votosporzonas',compact('voto_por_zonas'));
          

    }

    public function votos_por_puestos(){
        // VOTACIONES POR PUESTOS
         $voto_por_puesto= DB::table("persona_has_campanna as votacion")
               ->join('puesto_votacion','idpuesto_votacion','=','votacion.puesto')
              ->join('zona','idzona','=','puesto_votacion.fk_zona') 
              ->where('campanna_idcampanna',2)   
              ->select('nombre_puesto',DB::raw('count(votacion.puesto) as cantidad'))
              ->groupBy('nombre_puesto')  
             ->get();
            //return $voto_por_puesto;

            
             return view('dashboard.lider.votos_por_puestos',compact('voto_por_puesto'));
         
            
 
     }

     public function votos_por_mesa(){
        // VOTACIONES POR PUESTOS
         $voto_por_mesa= DB::table("persona_has_campanna as votacion")
               ->join('puesto_votacion','idpuesto_votacion','=','votacion.puesto')
               ->join('mesa','idmesa','=','votacion.mesa')
               ->join('zona','idzona','=','puesto_votacion.fk_zona') 
              ->where('campanna_idcampanna','=',function($query){
                $query->select('idcampanna')
                ->from('campanna')
                ->orderBy('idcampanna','desc')
                  ->limit(1)       
                  ->get();

                })   
              ->select('zona','nombre_puesto','mesa.mesa',DB::raw('count(votacion.mesa) as cantidad'))
              ->groupBy('zona','nombre_puesto','mesa.mesa')  
             ->get();
            //return $voto_por_mesa;

            
                return view('dashboard.lider.votos_por_mesa',compact('voto_por_mesa'));
         
            
          
 
     }

    public function total_lideres(){
        //ESTA CONSULTA TREA LOS USURIOS REGISTRADOS POR CADA LIDER
        $total_usu_reg_por_lideres=DB::table("persona as lider")
                        ->leftJoin('persona as usuario', 'lider.idpersona', '=', 'usuario.idpersonalider')  
                        ->where('lider.fktipousuario',2)                                             
                        ->select('lider.idpersona as id','lider.nombre as lider',DB::raw('COUNT(usuario.idpersona) as cantidad'))
                        ->groupBy('lider.nombre','lider.idpersona')
                        ->orderBy('cantidad','desc')
                        ->get();

                        return view('dashboard.lider.lideres',compact('total_usu_reg_por_lideres'));
    }
    public function registro_via_web(){
         //ESTA CONSULTA TREA LOS USURIOS REGISTRADOS POR EL SITIO WEB
         $registroweb=DB::table("persona as usuario")
         ->where('usuario.idpersonalider','=',null) 
         ->orWhere('via_registro', 0)                                            
         ->select('usuario.idpersona as id','usuario.nombre','usuario.apellido','usuario.telefono')
         ->groupBy('usuario.nombre','usuario.idpersona','usuario.apellido','usuario.telefono')
         ->orderBy('usuario.nombre','desc')
         ->get();
        
         return view('dashboard.lider.registroviaweb',compact('registroweb'));
    }

}
