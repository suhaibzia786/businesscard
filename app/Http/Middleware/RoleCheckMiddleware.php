<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            if(Auth::user()->role_id==1) {
                // Super User
                return redirect('');
            } elseif (Auth::user()->role_id==2) {
                // Sora User
                return redirect('');
            } else {
                // General User
                return redirect('');
            }
        }
        return $next($request);
    }
}