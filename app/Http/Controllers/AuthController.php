<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'exists:employees,nik'],
            'password' => ['required', 'confirmed', 'min:6'],
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.exists' => 'NIK tidak terdaftar sebagai karyawan.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        // Ambil data employee berdasarkan NIK
        $employee = Employee::where('nik', $request->nik)->first();

        if (!$employee) {
            return back()->withErrors(['nik' => 'NIK tidak ditemukan']);
        }

        // Cek apakah employee sudah memiliki akun user
        if (User::where('employee_id', $employee->id)->exists()) {
            return back()->withErrors(['nik' => 'NIK ini sudah digunakan untuk registrasi.']);
        }

        // Buat user baru
        $user = User::create([
            'employee_id' => $employee->id,
            'username' => $employee->name, // Gunakan nama karyawan atau default
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);


        // Auto-login setelah register (opsional)
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil! Anda sudah login.');
    }


    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'exists:employees,nik'],
            'password' => ['required'],
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.exists' => 'NIK tidak terdaftar sebagai karyawan.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Cari employee berdasarkan NIK
        $employee = Employee::where('nik', $request->nik)->first();

        if (!$employee) {
            return back()->withErrors(['nik' => 'NIK tidak ditemukan.']);
        }

        // Cek apakah user dengan employee_id ini ada di tabel users
        $user = User::where('employee_id', $employee->id)->first();

        if (!$user) {
            return back()->withErrors(['nik' => 'Akun belum terdaftar.']);
        }

        // Lakukan proses login menggunakan Auth
        if (Auth::attempt(['username' => $user->username, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['password' => 'Password salah.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
