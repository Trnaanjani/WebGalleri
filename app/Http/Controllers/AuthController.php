<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Method untuk menampilkan form login (untuk aplikasi berbasis web)
    public function showFormLogin()
    {
        return view('auth.login');
    }

    // Method untuk menangani proses login berbasis session (untuk aplikasi berbasis web)
    public function login(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Lakukan login
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // Jika gagal, kembali ke halaman login lagi
        return back()->with('error', 'Email atau password salah!');
    }

    // Method untuk menangani login berbasis token (API)
    public function loginApi(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            // Generate token untuk user
            $token = $user->createToken('YourAppName')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
            ], 200);
        }

        // Jika gagal login
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    // Method untuk logout (web dan API)
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
