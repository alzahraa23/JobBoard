<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class RoleMiddleware
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
   
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || !Auth::user()->user_role===$role) {
            // Redirect to some page or return a 403 response
            return redirect('/home')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }

}