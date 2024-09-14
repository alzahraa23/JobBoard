<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,$role): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        // تحقق من أن المستخدم لديه الدور المطلوب
        if (!Auth::user()->role===($role)) {
            return redirect('home')->with('error', 'You do not have the required permissions.');
        }

        return $next($request);
    }
}
