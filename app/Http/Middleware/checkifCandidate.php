<?php

namespace App\Http\Middleware;

use Response;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkifCandidate
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
        if ($request->user() && $request->user()->role != 'candidate')
        {

            return redirect()->guest('login');
        }
        return $next($request);

    }
}
