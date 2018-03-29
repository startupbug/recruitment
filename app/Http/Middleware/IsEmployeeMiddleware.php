<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsEmployeeMiddleware
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
        if(!Auth::check() || Auth::user()->role_id != '3'){
            return redirect()->route('login_index');
        }
        return $next($request);
    }
}
