<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifiez si l'utilisateur est authentifié et a le statut "admin"
        if (auth()->check() && auth()->user()->statut === 'admin') {
            return $next($request);
        }

        // Redirigez l'utilisateur vers une page d'erreur ou une autre destination
        return redirect('/');
    }
}
