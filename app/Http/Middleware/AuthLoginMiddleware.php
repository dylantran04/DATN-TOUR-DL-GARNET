<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthLoginMiddleware
{
    /**
     * Handle an incoming request.
     *@return mixed
     *@param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập trang này.');
    }   
}
