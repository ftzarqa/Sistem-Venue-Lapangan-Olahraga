<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Pastikan pengguna sudah login
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Jika terdapat parameter roles, periksa apakah role user memenuhi syarat
        if (! empty($roles) && ! in_array(Auth::user()->role, $roles)) {
            abort(403, 'Akses Ditolak! Anda tidak memiliki izin (role yang sesuai) untuk mengakses fitur ini.');
        }

        return $next($request);
    }
}
