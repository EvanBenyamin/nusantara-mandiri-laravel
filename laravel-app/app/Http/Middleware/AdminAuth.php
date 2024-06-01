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
        if (auth()->check()) {
            if (!auth()->user()->is_admin) { 
                    switch ($request->route()->getName()) {
                        case 'customer':
                        case 'user.status':
                        case 'user.reOrder':
                        case 'user.bayar':
                        case 'user.store':
                        case 'user.payments':
                        //MUST LIST CUSTOMER'S PAGE ABOVE
                            return $next($request);
                        default:
                            return redirect()->route('customer')->with('error', 'You have to be an admin user to access this page');
                    }
                
            }
        }else {
            // Check if the user is already on the 'getLogin' route to prevent infinite redirection loop
            if ($request->route()->getName() !== 'getLogin') {
                return redirect()->route('getLogin')->with('error', 'You have to be logged in to access this page');
            }
        }
        return $next($request);
    }
}    
