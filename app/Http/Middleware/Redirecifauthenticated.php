<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SufraganteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        switch($guard){
            case 'sufragante':
                if (Auth::guard($guard)->check()) {
                return redirect('/sufragante/dashboard');
                }
            break;
            default:
                if (Auth::guard($guard)->check()) {
                return redirect('/');
                }
            break;
        }

        
        return $next($request);
    }
}
