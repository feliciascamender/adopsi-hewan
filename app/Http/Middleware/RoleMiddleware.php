<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        //if belum login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')
            ->with('error', 'Anda harus login terlebih dahulu');
        }

        //if role ga sesuai
        if (Auth::user()->role !==$role) {
            abort(403, "Bub! Maaf ya, kamu belum ada izin untuk mengakses halaman ini( ﾟдﾟ)つ Bye!");
        }
        return $next($request);
    }