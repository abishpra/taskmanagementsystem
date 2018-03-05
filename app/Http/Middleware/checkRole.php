<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkRole
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
        //check user is login
        if (Auth::check() && Auth::user()->checkRole($role)){
            return $next($request);
        } else{
            return redirect('login');
        }
//        return $next($request);
    }
}
