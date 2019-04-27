<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeEnviado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

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
      //  $name=$request->all();
     //dd($name);
    /* Validator::make($request->all(), [
        'documento'   => 'required|string',
        'started_at'    => 'required|date',
        'finished_at'   => 'required|date|after:started_at',
     ]);*/

  $validarDatos= $request->validate([
      'documento'=>'required|min:5|max:16',
      'nombre'=>'required|string|min:2',
      'apellido'=>'required|string|min:2',
      'direccion'=>'required',
      'email'=>'email',      
      'telefono'=>'required',
      'region'=>'required',
      'municipio_votacion'=>'required',
      'departamento_votacion'=>'required',
      'mesa'=>'required',
      'puesto'=>'required',
      
  ]);

  $pass=str_random(8);
  $hashed_random_password = Hash::make($pass);
  $id_session_user=$request->session()->get('iduser');
       DB::table('persona')->insert(
            ['documento' => $request->documento, 'nombre' => $request->nombre, 
            'apellido' =>   $request->apellido , 'fechaNacimiento' =>  $request->fechaNacimiento,
            'sexo' =>  $request->genero , 'correo' => $request->email, 'telefono' => $request->telefono,
             'comuna' =>   $request->comuna, 'barrio' => $request->barrio,
            'direccion' => $request->direccion, 'fkpuesto_votacion' => $request->puesto, 'fk_mesa' => $request->mesa,
            'municipio' =>$request->municipio, 'password' => $hashed_random_password, 'idpersonalider'=>$id_session_user
            ]
        );

       $msn=$request->email." / ".$pass;
        Mail::to($request->email)->send(new MensajeEnviado($msn));
        //Hash::make($data['password'])
        return back()->with('msj','El usuario fue registrado corectamente');
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
        $regiones = DB::table('regiones')->where('estado',true)->get();
        $departamentos = DB::table('departamentos')->get();
        $municipios = DB::table('municipio')->get(); 
        $usuario= DB::table('persona')
                        ->leftJoin('municipio','codmunicipio','persona.municipio')
                        ->leftJoin('barrio','idbarrio','persona.barrio')
                        ->leftJoin('comuna','idcomuna','persona.comuna')
                        ->leftJoin('puesto_votacion','idpuesto_votacion','persona.fkpuesto_votacion')
                        ->leftJoin('mesa','idmesa','persona.fk_mesa')
                        ->where('idpersona',$id)
                        ->first(); 
        return view('dashboard.sbadmin.actualizarusuario',compact('regiones','departamentos','municipios','usuario'));
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
        $id_session_user=$request->session()->get('iduser');
      
          DB::table('persona')
            ->where('idpersona', $id)
            ->update( ['documento' => $request->documento, 'nombre' => $request->nombre, 
                'apellido' =>   $request->apellido , 'fechaNacimiento' =>  $request->fechaNacimiento,
                'sexo' =>  $request->genero , 'correo' => $request->email, 'telefono' => $request->telefono,
                'comuna' =>   $request->comuna, 'barrio' => $request->barrio,
                'direccion' => $request->direccion, 'fkpuesto_votacion' => $request->puesto, 'fk_mesa' => $request->mesa,
                'municipio' =>$request->municipio,'idpersonalider'=>$id_session_user,'fktipousuario'=>$request->tpusuario
                ]);

                return back()->with('msj','El usuario fue actualizado correctamente');

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
        ->select(DB::raw('CONCAT(nombre, " ", apellido) as nombre'))
        ->where('documento',"=",$id)        
        ->get();
       
       return $documento;
    }

    public function formchangepass(){
       
        return view('dashboard.sbadmin.profile.cambiar_password');
    }

    public function formchangeprofilepass(){
       
        return view('dashboard.sbadmin.profile.changeprofile_password');
    }

    //ACTUALIZAR PASSWORD DE USUARIO Y ENVIAR AL CORREO
    public function changepassword(Request $request)
    {
        $validarDatos= $request->validate([
            'documento'=>'required|min:5', 
        ]);
        $documento=$request->documento;
        //BUSCAMOS AL USUARIO PARA EXTRAER SU CORREO Y ENVIARLE EL NUEVO PASSWORD
        $datos="";

        $datos = DB::table('persona')        
        ->where('documento',"=",$documento)
        ->select('correo','nombre','apellido')
        ->first();      
       //dd($datos);
        if(!is_null($datos))
        {
            $pass=str_random(8);
            $hashed_random_password = Hash::make($pass); 
            $msn=$datos->correo." / ".$pass;
           DB::table('persona')
                ->where('documento', $documento)
                ->update(['password' => $hashed_random_password]);
    
             Mail::to($datos->correo)->send(new MensajeEnviado($msn));

             return back()->with(['msjpass'=>'Se ha enviado la nueva contraseña al correo:'.$datos->correo]);
        }
        else{
           // dd($datos);
           return back()->withErrors(['mensaje'=>'El documento ingresado no se encuentra registrado']);
          
        }
      
    }

    //ACTUALIZAR PASSWORD DE USUARIO Y ENVIAR AL CORREO
    public function changepasswordinicial(Request $request)
    {
        $validarDatos= $request->validate([
            'documento'=>'required|min:5', 
        ]);
        $documento=$request->documento;
        //BUSCAMOS AL USUARIO PARA EXTRAER SU CORREO Y ENVIARLE EL NUEVO PASSWORD
        $datos="";

        $datos = DB::table('persona')        
        ->where('documento',"=",$documento)
        ->select('correo','nombre','apellido')
        ->first();      
       //dd($datos);
        if(!is_null($datos))
        {
            $pass=str_random(8);
            $hashed_random_password = Hash::make($pass); 
            $msn=$datos->correo." / ".$pass;
           DB::table('persona')
                ->where('documento', $documento)
                ->update(['password' => $hashed_random_password]);
    
             Mail::to($datos->correo)->send(new MensajeEnviado($msn));

             return back()->with(['msjpass'=>'Se ha enviado la nueva contraseña al correo:'.$datos->correo]);
        }
        else{
           // dd($datos);
           return back()->withErrors(['mensaje'=>'EL NUMERO DE DOCUMENTO NO SE ENCUENTRA EN NUESTROS REGISTROS']);
          
        }
      
    }


    //ACTUALIZAR MI CONTRASEÑA DE PERFIL
    public function changeprofilepassword(Request $request)
    {
        $validarDatos= $request->validate([
            'pass'=>'required', 
        ]);
        $pass=$request->pass;
        //BUSCAMOS AL USUARIO PARA EXTRAER SU CORREO Y ENVIARLE EL NUEVO PASSWORD
        $idsession=session('iduser');
       
        
            //$pass=str_random(8);
            $hashed_random_password = Hash::make($pass); 
           $msn=$pass;
           DB::table('persona')
                ->where('idpersona', $idsession)
                ->update(['password' => $hashed_random_password]);
    
             Mail::to("micorreo@g.com")->send(new MensajeEnviado($msn));

             return back()->with(['msj'=>'Se ha actualizado tu contraseña']);
       
       

      
    }

    public function registro_user_from_website(Request $request)
    {
        $validarDatos= $request->validate([
            'documento'=>'required|min:5|max:22',
            'nombre'=>'required|string|min:2',
            'apellido'=>'required|string|min:2',        
            'email'=>'required|email',      
            'telefono'=>'required',
            
        ]);
        //CONSULTAMOS QUE EL USUARIO NO ESTE REGISTRADO
        $dato=DB::table('persona')->where('documento','=', $request->documento)->count();
       //CREAMOS LA CONTRASEÑA Y LA HASHEAMOS
        $pass=str_random(8);
        $hashed_random_password = Hash::make($pass);

           if($dato>0){

                return back()->withErrors(['msj'=>'Existe un registro vinculado al numero de documento ingresado']);
            }
            else{
                    try{

                    
                    DB::table('persona')->insert(
                        ['documento' => $request->documento, 'nombre' => $request->nombre, 
                        'apellido' =>   $request->apellido ,'correo' => $request->email, 'telefono' => $request->telefono,
                        'direccion' => $request->direccion,'password' => $hashed_random_password,'via_registro'=>0
                        ]);

                        $msn=$request->email." / ".$pass;
                        Mail::to($request->email)->send(new MensajeEnviado($msn));

                        return back()->with(['msg'=>'Gracias por registrarte. Se ha enviado a tu correo <b>'. $request->email.'</b> la clave de acceso al sistemas']);
                    } 
                    catch(QueryException $ex){ 
                        //VERIFICAMOS QUE EL CORREO INGRESADO NO ESTE EN EL SISTEMA
                        if($ex->errorInfo[1]==1062){

                            return back()->withErrors(['msj'=>'El correo '. $request->email.'ya se encuentra registrado. Por favor ingrese un correo nuevo o contactenos al 2425254, o escribanos al correo <b>soporte@amigosdehardany.com</b> si tiene alguna inquietud']);

                        } 
                        // Note any method of class PDOException can be called on $ex.
                      }   
            
                    }
        
    }


}
