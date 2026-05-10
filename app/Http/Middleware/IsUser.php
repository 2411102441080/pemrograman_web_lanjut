<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class IsUser
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
        if (Auth::user()->role === 'USER') {
            return $next($request);
        }
        if (Auth::user()->role === 'ADMIN') {
            return redirect('/admin'); // Arahkan ke halaman admin jika role adalah ADMIN
        }
        return redirect('/'); // Arahkan kembali jika bukan user
    }
}
