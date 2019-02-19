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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function puestovotaciones($id)
    {
        $datospuestovotacion = DB::table('puesto_votacion')->leftJoin('municipio', 
        'puesto_votacion.municipio_codmunicipio', '=', 'municipio.codmunicipio')
        ->where('puesto_votacion.municipio_codmunicipio',"=",$id)
        ->select('idpuesto_votacion', 'nombre')
        ->orderBy('nombre','asc')
        ->get();
       
       return $datospuestovotacion;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comuna($id)
    {
        $datosmunicipio = DB::table('municipio')->leftJoin('departamentos', 
        'municipio.departamentos_coddepartamentos', '=', 'departamentos.coddepartamentos')
        ->where('municipio.departamentos_coddepartamentos',"=",$id)
        ->select('codmunicipio', 'municipio')
        ->get();
       return $datosmunicipio;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function barrio($id)
    {
        $datosmunicipio = DB::table('municipio')->leftJoin('departamentos', 
        'municipio.departamentos_coddepartamentos', '=', 'departamentos.coddepartamentos')
        ->where('municipio.departamentos_coddepartamentos',"=",$id)
        ->select('codmunicipio', 'municipio')
        
        ->get();
       return $datosmunicipio;
    }

}
