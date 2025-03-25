<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }

        if (Auth::user()->role !== $role) {
            return redirect()->route('dashboard')->withErrors(['message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
        }

        return $next($request);
    }
}

