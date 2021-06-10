<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {


          
            return redirect('/home');
        }

        return $next($request);
    }

    // public function handle($request, Closure $next, $guard = null)
    // {
    //  //$user = \Auth::user();
     
    //  //$role = $user->roles->first()->name;
    //  $role = \Auth::check(); 
    //  //var_dump($role);exit;



    //  switch ($role) {
    //     case 'ROLE_HOSPITAL':
    //     if (Auth::guard($guard)->check()) {
    //           return redirect('/hospital/users');
    //     }
    //     case 'ROLE_ADMIN':
    //     if (Auth::guard($guard)->check()) {
    //         return redirect('/admin/users');
    //     }
    //     default:
    //     if (Auth::guard($guard)->check()) {
    //              return redirect('/home'); 
    //         }
    //         break;

    //     return $next($request);
    // }
// /}

}
