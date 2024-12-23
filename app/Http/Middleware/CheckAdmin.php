<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard= 'admin')
    {
    	if (!Auth::guard($guard)->check()) {
    		return redirect('/admin/login');
    	}
    	Config::set('auth.defaults.guard', 'admin');
    	return $next($request);
    }
}
