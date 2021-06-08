<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckRoles
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
        $except = ['destroy','show','store','update'];
        $except = array_merge($except,array_slice(func_get_args(), 2));
        if(auth()->user()->hasRoles(['admin'])){
            return $next($request);
        }else if(count($except) && Str::contains(Route::currentRouteName(), $except)){
            return $next($request);
        }else if(auth()->user()->hasRights(Route::currentRouteName())){
            return $next($request);
        }
        return redirect("/");
    }
}