<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,$roles): Response
    {
        foreach($roles as $role){
            if(Auth::check() && Auth::user()->role == $role){
                return $next($request);
        }
    }
    Auth::logout();
    return redirect()->route('login')-> with('status','not authorized');
    }
}