<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // HALAMAN LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    // HALAMAN REGISTER
    public function showRegister()
    {
        return view('auth.register');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        // VALIDASI LOGIN
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ], [
            'username.required' => 'Nama Lengkap wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // CEK LOGIN
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            // REDIRECT BERDASARKAN ROLE
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')
                                 ->with('success', 'Selamat datang Admin 🔥');
            }

            return redirect()->route('beranda')
                             ->with('success', 'Login berhasil, selamat datang!');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah'
        ]);
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        // VALIDASI REGISTER
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,user',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.unique' => 'Nama Lengkap sudah digunakan',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'role.required' => 'Role wajib dipilih',
            'role.in' => 'Role tidak valid',
        ]);

        // SIMPAN USER DENGAN ROLE DARI FORM
        $user = User::create([
            'name' => $request->name,
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // ambil dari form
        ]);

        // LOGIN OTOMATIS
        Auth::login($user);

        // REDIRECT BERDASARKAN ROLE
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')
                             ->with('success', 'Selamat datang Admin 🔥');
        }

        return redirect()->route('beranda')
                         ->with('success', 'Registrasi berhasil, selamat datang!');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
                         ->with('success', 'Anda berhasil logout');
    }
}
