<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the role of "admin"
        if ($request->user() && $request->user()->role == 'admin') {
            return $next($request);
        }

        // Redirect the user or return an unauthorized response
        return redirect()->route('login');
    }
}
