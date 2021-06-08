<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        if (auth()->check() && auth()->user()->role == 1 or auth()->user()->role == 2){
            return $next($request);
        }else if(auth()->check() && auth()->user()->role == 3){
            return redirect('/');
        }
    }
}
