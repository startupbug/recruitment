<?php

namespace App\Http\Middleware;

use Closure;
use App\AssignRole;
use Illuminate\Support\Facades\View;
use Auth;
class RoleAdmin
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
        if(Auth::check()){
            $role = AssignRole::where('assigned_user_id', Auth::user()->id)->first();
            if($role->assign_role_details == 2){
            // dd($role);
                return $next($request);
            }
            return redirect()->route('not_authorize');
        }
        return redirect()->route('login_index');
    }
}
