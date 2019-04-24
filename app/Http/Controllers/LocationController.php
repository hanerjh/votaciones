<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

  
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function departamentos($id)
    {
        $datosdepratamentos = DB::table('departamentos')->leftJoin('regiones', 
        'departamentos.regiones_idregiones', '=', 'regiones.idregiones')
        ->where('departamentos.regiones_idregiones',"=",$id)
        ->select('coddepartamentos', 'departamento')
        ->orderBy('departamento','asc')
        ->get();

       return $datosdepratamentos;
    }

    public function zonas($id)
    {
        $zonas = DB::table('zona')->leftJoin('municipio', 
        'municipio.codmunicipio', '=', 'zona.fk_codmunicipio')
        ->where('zona.fk_codmunicipio',"=",$id)
        ->select('zona', 'idzona')
        ->orderBy('zona','asc')
        ->get();

       return $zonas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function municipios($id)
    {
        $datosmunicipio = DB::table('municipio')->leftJoin('departamentos', 
        'municipio.departamentos_coddepartamentos', '=', 'departamentos.coddepartamentos')
        ->where([
                    ['municipio.departamentos_coddepartamentos',"=",$id],
                    ['municipio.estado',true]
                ])     
        ->select('codmunicipio', 'municipio')
        ->orderBy('municipio','asc')
        ->get();
       return $datosmunicipio;
    }

    /**
     * carga los municipios en la seccion de personas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function municipios_persona($id)
    {
        $datosmunicipio = DB::table('municipio')->leftJoin('departamentos', 
        'municipio.departamentos_coddepartamentos', '=', 'departamentos.coddepartamentos')
        ->where('municipio.departamentos_coddepartamentos',"=",$id)
        ->select('codmunicipio', 'municipio')
        ->orderBy('municipio','asc')
        ->get();

      
        return $datosmunicipio;
       

    }
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function puestovotacionesgeneral($id)
    {
        //lanza todos los puestos de votacion
        $datospuestovotacion = DB::table('puesto_votacion')
        ->leftJoin('municipio','puesto_votacion.municipio_codmunicipio', '=', 'municipio.codmunicipio')       
        ->where('puesto_votacion.municipio_codmunicipio',"=",$id)
        ->select('idpuesto_votacion', 'nombre_puesto')
        ->orderBy('nombre_puesto','asc')       
        ->get();       
       
       return $datospuestovotacion;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function puestovotaciones($id)
    {
        /*//lanza todos los puestos de votacion
        $datospuestovotacion = DB::table('puesto_votacion')
        ->leftJoin('municipio','puesto_votacion.municipio_codmunicipio', '=', 'municipio.codmunicipio')       
        ->where('puesto_votacion.municipio_codmunicipio',"=",$id)
        ->select('idpuesto_votacion', 'nombre')
        ->orderBy('nombre','asc')       
        ->get();*/

        
        //lanza los puesto de votacion que ya tienen mesas asignadas
        $datospuestovotacion = DB::table('puesto_votacion')
        ->leftJoin('municipio','puesto_votacion.municipio_codmunicipio', '=', 'municipio.codmunicipio')
        ->join('mesa','puesto_votacion.idpuesto_votacion','=','mesa.puesto_mesa')
        ->where('puesto_votacion.municipio_codmunicipio',"=",$id)
        ->select('idpuesto_votacion', 'nombre_puesto')
        ->orderBy('nombre_puesto','asc')
        ->groupBy('idpuesto_votacion', 'nombre_puesto')
        ->get();
       
       return $datospuestovotacion;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comunas_persona($id)
    {
        $comunas = DB::table('comuna')->leftJoin('municipio', 
        'comuna.municipio_codmunicipio', '=', 'municipio.codmunicipio')
        ->where('comuna.municipio_codmunicipio',"=",$id)
        ->select('idcomuna', 'comuna')
        ->get();

        $lista = DB::table('barrio')
        ->join('comuna','barrio.comuna_idcomuna', '=','comuna.idcomuna' )
        ->join('municipio','comuna.municipio_codmunicipio', '=', 'municipio.codmunicipio' )        
        ->where('municipio.codmunicipio','=',$id)
        ->select('idbarrio', 'barrio','comuna.idcomuna')
        ->groupBy('idbarrio', 'barrio','comuna.idcomuna')
        ->get();

      
     
        
        //return Response::json(array('comunas' => $comunas, 'barrio' => $lista));
       return array($comunas, $lista);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function barrio($id)
    {
        $lista = DB::table('barrio')
        ->join('comuna','barrio.comuna_idcomuna', '=','comuna.idcomuna' )
        ->join('municipio','comuna.municipio_codmunicipio', '=', 'municipio.codmunicipio' )
        ->where('municipio.codmunicipio',"=",$id)
        ->select('idbarrio', 'barrio')
        ->get();

       
       return $lista;
    }

    
     /**
      *  llenar el combobox de registro de puesto de votacion
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function barriosgeneral($id)
    {
        $lista = DB::table('barrio')
        ->join('comuna','barrio.comuna_idcomuna', '=','comuna.idcomuna' )
        ->where('barrio.comuna_idcomuna',"=",$id)
        ->select('idbarrio', 'barrio')
        ->get();

       
       return $lista;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mesas($id)
    {
        $mesas = DB::table('mesa')->leftJoin('puesto_votacion', 
        'mesa.puesto_mesa', '=', 'puesto_votacion.idpuesto_votacion')
        ->where('mesa.puesto_mesa',"=",$id)
        ->select('idmesa', 'mesa')
        ->orderBy('mesa','asc')        
        ->get();
       return $mesas;
    }

}
