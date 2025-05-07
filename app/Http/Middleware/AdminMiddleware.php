<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // hak akses untuk admin.
        if(Auth::check() && Auth::user()->isAdmin)
        {
            return $next($request);
        }
        
        // handle jika user bukan admin
        return redirect()->route('dashboard.user');

        
    }
}
