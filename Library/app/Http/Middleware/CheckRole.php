<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Jika user belum login atau role user tidak ada dalam daftar yang diizinkan
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            // Arahkan ke dashboard/halaman buku dengan pesan error
            return redirect()->route('books.index')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        return $next($request);
    }
}