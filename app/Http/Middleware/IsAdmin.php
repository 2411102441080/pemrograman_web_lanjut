<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        if (!Auth::check() ){
            return redirect()->route('login');
        }
        if (Auth::user()->role === 'ADMIN') {
            return $next($request);
        }
        return redirect('/'); // Arahkan kembali jika bukan admin
    }
}
