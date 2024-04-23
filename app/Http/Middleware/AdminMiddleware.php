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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!auth()->user() || !auth()->user()->is_admin) {
    //         abort(403, 'Access denied');
    //     }

    //     return $next($request);
    // }

    // public function handle(Request $request, Closure $next, $type)
    // {
    //     if (Auth::check() && Auth::user()->userType === $type) {
    //         return $next($request);
    //     }
        
    //     abort(403, 'Unauthorized.');
    // }

    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->userType == 'admin') {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'Acesso não autorizado.'); // Redireciona para o dashboard e exibe uma mensagem de erro
    }

    
}
