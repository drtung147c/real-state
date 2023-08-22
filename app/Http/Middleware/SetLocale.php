<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        app()->setLocale('vi');

        return $next($request);
    }
}
