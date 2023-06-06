<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isadmin) {
            return $next($request);
        }

        return redirect('/dashboard');
    }
}
