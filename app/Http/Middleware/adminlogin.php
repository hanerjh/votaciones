<?php

namespace App\Http\Middleware;

use Closure;

class adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->get('tipousu')===3){
            return $next($request);
        }
        return redirect('inicio');
     
    }
}
