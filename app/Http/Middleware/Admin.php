<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user login & role admin
        if (auth()->check() && auth()->user()->usertype === 'admin') {
            return $next($request);
        }

        // Kalau bukan admin
        abort(403, 'Akses khusus admin');
    }
}
