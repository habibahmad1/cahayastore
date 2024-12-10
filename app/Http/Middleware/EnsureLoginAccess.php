<?php

namespace App\Http\Middleware;

use Closure;

class EnsureLoginAccess
{
    public function handle($request, Closure $next)
    {
        // Cek apakah session 'can_access_login' ada
        if (!session('can_access_login')) {
            return redirect('/')->with('error', 'Silakan gunakan tombol login untuk mengakses halaman ini.');
        }

        // Hapus session setelah validasi agar tidak bisa digunakan ulang
        session()->forget('can_access_login');

        return $next($request);
    }
}
