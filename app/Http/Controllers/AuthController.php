<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    //menampilkan halaman login
    public function showLogin()
    {
        //kalo udah logi, redirect ke dashboard sesuai role
        if (auth()->check()) {
            return $this->redirectBasedOnRole();
        }
        return view('auth.login');
    }

    //proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            //log untuk debugginf(opsional)
            logger()->info('User logged in', [
                'user_id' => auth()->id(),
                'role' => auth()->user()->role,
            ]);

            return $this->redirectBasedOnRole()
            ->with('success', 'Halo calon babu!' . auth()->user()->name . '（￣︶￣）↗');
        }

        return back()
        ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

 /*
  * tampilkan halaman registe
  */

 public function showRegister()
 {
     //kalo udah login, redirect sesuai role
     if (auth()->check()) {
         return $this->redirectBasedOnRole();
     }
     return view('auth.register');
 }

    /*
    * proses register (selalu jadi adopter)
    */ 

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'phone'    => ['nullable', 'string', 'max:12'],
            'address'  => ['nullable', 'string', 'max:500'],
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'adopter', // ALWAYS adopter saat register
            'phone'    => $validated['phone'] ?? null,
            'address'  => $validated['address'] ?? null,
        ]);

        Auth::login($user);

        return redirect()->route('adopter.dashboard')
        ->with('success', 'Selamat datang, calon babu ' . auth()->user()->name . '（￣︶￣）↗');
    }

    /**
     * logout user
     */
    public function logout(Request $request)
    {
        $userName = auth()->user()->name; // Ambil nama sebelum logout

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
        ->with('success', 'Selamat tinggal, ' . $userName . '（￣︶￣）↗');
    }

    /**
     * Helper: redirect berdasarkan role
     */

    private function redirectBasedOnRole()
    {
        return match (auth()->user()->role) {
            'adopter' => redirect()->route('adopter.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            default => redirect()->route('home'),
        };
    }
}