<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if($request->session()->has('user_id')){

            return $next($request);
        
        }else{

            return redirect()->route('home.usuarios.index');

        }
        
    }
}
