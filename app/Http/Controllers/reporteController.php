<?php

namespace App\Http\Controllers;

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
       
        //return $cant_usu_reg_lider;
        //return view('dashboard.sbadmin.dash');
        return view('dashboard.sbadmin.dash',compact('regiones','departamentos','municipios','cant_usu_registrado','cant_lider_registrado','cant_usu_reg_lider','total_usu_reg_por_lideres'));
    }

}
