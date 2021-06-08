<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthForCheckOut
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
        if (Auth()->check() && auth()->user()) {
            return $next($request);
        }

        elseif(!Auth()->check() && auth()->user()){
            return redirect(RouteServiceProvider::CheckAuthForCheckOut);
        }


    }
}
