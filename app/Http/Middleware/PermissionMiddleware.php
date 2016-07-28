<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissionName)
    {
    	if ($request->user() == null) {
    		return response('Not authorised.', 401);
    	} else {
	    	if (!$request->user()->hasPermission($permissionName)) {
	    		return response('You do not have permission to view this page.', 401);
	    	}
    	}

        return $next($request);
    }
}
