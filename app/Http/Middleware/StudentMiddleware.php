<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);

        if(!Auth::guard('student')->check()){
            return redirect('/home');
        }
    }
}
