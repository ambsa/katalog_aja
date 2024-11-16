<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Halaman Login Form
    public function showLoginForm()
    {
        return view('auth.login');  // Pastikan Anda punya view 'auth.login'
    }

    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    // Cek apakah email dan password cocok dengan yang ada di database
    if (Auth::attempt($credentials)) {
        // Jika login berhasil, redirect sesuai dengan peran
        return $this->authenticated($request, Auth::user());
    }

    // Jika login gagal
    return back()->withErrors(['email' => 'Login gagal, coba lagi.']);
    }

    // Setelah berhasil login, redirect berdasarkan role
    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 1) { // Admin = 1
            return redirect()->route('admin.index');
        } elseif ($user->role == 2) { // User = 2
            return redirect()->route('user.index');
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegisterForm()
{
    return view('auth.register'); // Pastikan Anda memiliki file `register.blade.php` di folder `resources/views/auth`
}


    public function register(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    // Simpan data pengguna ke database
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 2, // Default sebagai user
    ]);

    // Login otomatis setelah register (opsional)
    Auth::login($user);

    // Redirect ke halaman utama atau dashboard
    return redirect()->route('login')->with('success', 'Account created successfully!');
}


    //
}
