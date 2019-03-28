<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class adminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/users/details';  

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginFormUsers(){
        return view('login');
    }

    public function username(){
        return 'email';
    }

    
    function login(Request $request){

       /* $credentials= $this->validate(request(),[
            'email'=>'email|required|string',
            'pass'=>'required|string'
        ]);*/

        $credentials= $this->validate($request, [
            'email'=>'email|required|string',
            'pass'=>'required|string'
        ]);

       /* $user_data = array(
            'gf_email'  => $request->get('input-email'),
            'password' => $request->get('input-password')
        );*/

        if(!Auth::attempt($credentials)){
          
            return back()->withErrors(['mensaje'=>'Error al iniciar sesion, por favor verifique sus credenciales']);

        }

        if (Auth::check() ) {
            return redirect()->route('dashboard');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
