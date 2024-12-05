<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Se l'utente non è autenticato o non è admin, reindirizza alla home
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
