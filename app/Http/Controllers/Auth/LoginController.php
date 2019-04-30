<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/


    public function login(Request $request){

       $credentials= $this->validate(request(),[
            'email'=>'email|required|string',
            'pass'=>'required|string'
        ]);
         
       /*if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return back()->withErros(['mensaje','Los datos ingresados no se encontraron en el sistema']);*/

       //return $hashed_random_password = Hash::make(str_random(8));
     
     /* $usuario= DB::table('persona')
        ->where([['correo',$credentials['email']],['password',$credentials['pass']]])
        ->limit(1)
        ->select('nombre','apellido','correo')
        ->get();*/

        $usuario= DB::table('persona')
        ->where('correo',$credentials['email'])        
        ->select('idpersona','nombre','apellido','password','fktipousuario')
        ->first();
     // dd($usuario);
       if($usuario){
             $id= $usuario->idpersona;
             $tpusu=$usuario->fktipousuario;
             $nombre= $usuario->nombre;
             $hashedPassword= $usuario->password;
             //dd($hashedPassword);
               if (Hash::check($credentials['pass'], $hashedPassword)) {
               // if (Auth::attempt(['password' => $hashedPassword])) {
                   // Auth::login($id);
                   $request->session()->put('iduser',$id);
                   $request->session()->put('user',$nombre);
                   $request->session()->put('tipousu',$tpusu);
                  
                   if($tpusu==2){ //LIDERES
                    return redirect()->route('dashboardlider');
                   }
                   else if($tpusu==3){ // ADMINISTRADORES
                    return redirect()->route('dashboard');
                   }
                 
                    //return view('dashboard.sbadmin.dash');
                    //$usuario->nombre;
                }
                return back()->withErrors(['mensaje'=>'El correo o La contraseña es incorrecta, intentelo de nuevo']);

       }  
       return back()->withErrors(['mensaje'=>'Error al iniciar sesion, por favor verifique sus credenciales']);
    }

    public function showLoginForm(){
        return view('login');
    }

    public function logout(Request $request){
       //Auth::logout();
         $request->session()->forget('iduser');
         $request->session()->forget('user');
        // $request->session()->flush();
        return redirect()->route('inicio');
    }
}
