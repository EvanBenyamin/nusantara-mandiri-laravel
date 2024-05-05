<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            if(!auth()->user()){ // check is admin?
                return redirect()->route('getLogin')->with('error','You have to be admin user to access this page');
            }
        }else{
            return redirect()->route('getLogin')->with('error','You have to be logged in to access this page');
        }
        return $next($request);
    }
}

