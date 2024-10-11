<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Subfission\Cas\Facades\Cas;

class CasAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah terautentikasi melalui CAS
        if (!Cas::isAuthenticated()) {
            // Jika belum terautentikasi, arahkan ke halaman login CAS
            return Cas::authenticate();
        }

        // Jika terautentikasi, lanjutkan ke request berikutnya
        return $next($request);
    }
}
