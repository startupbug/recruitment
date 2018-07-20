<?php

namespace App\Http\Middleware;

use Closure;
use App\AssignRole;
use Illuminate\Support\Facades\View;
use Auth;
class RoleTestManager
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
        if(Auth::check() && Auth::user()->role_id != '3'){
            $role = AssignRole::where('assigned_user_id', Auth::user()->id)->first();
            // dd($role);
            if($role->assign_role_details == 2){
                return $next($request);
            }
            return redirect()->route('not_authorize');
        }
        elseif(Auth::check() && Auth::user()->role_id == '3'){
            return $next($request);
        }
        return redirect()->route('login_index');
    }
}
