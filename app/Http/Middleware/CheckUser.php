<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Support\Facades\Auth;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
    	if (!Auth::guard($guard)->check()) {
    		return redirect('/login');
    	}
    	Config::set('auth.defaults.guard', $guard);
    	return $next($request);
    }
}
