<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\AssignRole;
use App\User;
class RoleVariable
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // dd($role);
        // if(Auth::check() && Auth::user()->role_id != '3'){
        //     $role = AssignRole::where('assigned_user_id', Auth::user()->id)->first();
        //     if($role->assign_role_details == 1){
        //        // dd($next($request));
        //         return $next($request);
        //     }
        //     return redirect()->route('not_authorize');
        // }
        // elseif(Auth::check() && Auth::user()->role_id == '3'){
        //     return $next($request);
        // }
        // return redirect()->route('login_index');
        $role_array = explode('|', $role);
            // dd($request->user()->hasRole($role_array));
        if ($request->user()->hasRole($role_array)){
            if(Auth::user()->role_id != 3){
                $assigned = AssignRole::where('assigned_user_id', Auth::user()->id)->first();

                if(Auth::user()->role_id == $assigned->assign_role_details){
                    return $next($request);
                }
                return redirect()->route('not_authorize');
            }
            elseif(Auth::user()->role_id == 3){
                    return $next($request);
            }
            return redirect()->route('login_index');
        }
        else{
            return redirect()->route('login_index');
        }
    }

}