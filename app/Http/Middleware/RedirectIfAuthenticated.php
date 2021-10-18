<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check() && Auth::user()->role->id == 1) {
            return redirect()->route('admin.index');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 2) {
            return redirect()->route('user.index');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 3) {
            return redirect()->route('stakeholder.index');
        }else {
            return $next($request);
        }
    }
}
