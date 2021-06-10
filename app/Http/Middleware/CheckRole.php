<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth; 
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next, $role)
    {
        //echo $role;die;
        // if (! $request->user()->hasRole($role)) {
        //     //abort(401, 'This action is unauthorized.');
        //     return redirect('home');
        // }
        return $next($request);
    }
}
