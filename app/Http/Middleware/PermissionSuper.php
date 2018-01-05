<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionSuper
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
        // Check if a user is logged in.
        // Check if a user is logged in.
        if (Auth::user()->slug == 'admin')
        {
            return $next($request);
        }
        // If we reach this far, the user does not have the required permissions.
        return redirect('/admin');

    }

}
