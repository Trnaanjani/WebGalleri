<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    // Menambah pengguna baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:user', // Pastikan nama tabel user
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user', // Pastikan nama tabel user
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return response()->json($user, 201);
    }

    // Menampilkan pengguna berdasarkan ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // Mengupdate pengguna
    public function update(Request $request, $id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::find($id);

        // Jika pengguna tidak ditemukan, kirim pesan error
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->id, // Pastikan nama tabel user
            'password' => 'nullable|string|min:6', // Password opsional jika ingin mengganti
        ]);

        // Update data pengguna
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->email = $request->email;

        // Jika password baru diberikan, maka update password
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
