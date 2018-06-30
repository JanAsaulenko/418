<?php

namespace App\Http\Middleware;

use Closure;

class ModersMiddleware
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
        $x=12;
        if ($x==1) {
            return redirect('posts');
        }
        return $next($request);
    }
}
