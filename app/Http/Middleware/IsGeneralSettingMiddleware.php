<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsRecruiterMiddleware
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
        if(!Auth::check() || (Auth::user()->role_id != '3' && Auth::user()->role_id != '4' && Auth::user()->role_id != '5' && Auth::user()->role_id != '6' && Auth::user()->role_id != '7')){
            return redirect()->route('login_index');
        }
        return $next($request);
    }
}
