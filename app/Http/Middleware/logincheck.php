<?php

namespace App\Http\Middleware;

use Closure;

class logincheck
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
        if($request->session()->get('iduser')===null){
            return redirect('inicio');
        }
        return $next($request);
      
    }
}
