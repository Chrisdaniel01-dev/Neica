<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and is an admin
        if ($request->user() && $request->user()->is_admin) {
            return $next($request);
        }

        // If not admin, redirect to home or show error
        return redirect('/')->with('error', 'Access denied. Admin privileges required.');
    }
}
