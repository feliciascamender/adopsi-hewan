<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //menampilkan halaman login
    public function showLogin()
    {
        //kalo udah logi, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectByRole();
        }
        return view('auth.login');
    }

    //proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return $this->redirectByRole();
        }

        return back()
        ->withInput($request->only('email'))
        ->withErrors(['email' => 'Email atau password salah']);
    }

    //menampilkan halman register
    public function showRegister()
    {
        if (Auth::check()) {
            return $this->redirectByRole();
        }
        return view('auth.register');
    }

    //proses register (adopter)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:100',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'adopter',
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        Auth::login($user);
        return redirect()->route('adopter.dashboard')
        ->with('success', 'Registrasi berhasil. Selamat datang, ' . $user->name . 'ヾ(≧▽≦*)o');
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
        ->with('success', 'Anda berhasil logout. Sampai jumpa lagi! (＾▽＾)');
    }

    //helper: redirect sesuai role
    private function redirectByRole()
    {
    if (Auth::user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('adopter.dashboard');
    }
}