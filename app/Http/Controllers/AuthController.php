<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLogin(): View|RedirectResponse
    {
        return Auth::check()
            ? $this->redirectBasedOnRole()
            : view('auth.login');
    }

    /**
     * Memproses login pengguna menggunakan session guard bawaan Laravel.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:rfc'],
            'password' => ['required', 'string'],
        ]);

        $credentials['email'] = Str::lower($credentials['email']);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return $this->redirectBasedOnRole()
            ->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
    }

    /**
     * Menampilkan halaman register.
     */
    public function showRegister(): View|RedirectResponse
    {
        return Auth::check()
            ? $this->redirectBasedOnRole()
            : view('auth.register');
    }

    /**
     * Memproses register. Akun dari form publik selalu dibuat sebagai adopter.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::min(8), 'max:255'],
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+()\-\s]+$/'],
            'address' => ['nullable', 'string', 'max:500'],
        ], [
            'phone.regex' => 'Nomor HP hanya boleh berisi angka, spasi, +, -, dan tanda kurung.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => Str::lower($validated['email']),
            'password' => Hash::make($validated['password']),
            'role' => 'adopter',
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('adopter.dashboard')
            ->with('success', 'Registrasi berhasil. Selamat datang, ' . $user->name . '!');
    }

    /**
     * Logout pengguna dan invalidasi session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Anda berhasil logout.');
    }

    /**
     * Redirect pengguna sesuai role setelah login/register.
     */
    private function redirectBasedOnRole(): RedirectResponse
    {
        return match (Auth::user()?->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'adopter' => redirect()->route('adopter.dashboard'),
            default => redirect()->route('home'),
        };
    }
}
