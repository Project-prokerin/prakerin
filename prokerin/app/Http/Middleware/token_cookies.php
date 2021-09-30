<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class token_cookies
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
        setcookie('Sikatos_cookie', $request->token, 2147483647);
        return $next($request);
    }
}
