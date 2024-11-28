<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user; // Menggunakan model user


class UserController extends Controller
{
    public function index()
    {
        
        $users = User::all(); // Ambil semua data dari tabel user
        return view('admin.manajemen-admin.index', [
            'tittle' => 'Manajemen Admin',
            'users' => $users, // Mengirimkan daftar pengguna
        ]);
    }

    
    public function create()
    {
        return view('admin.manajemen-admin.create', [
            'tittle' => 'Tambah Admin Baru',
        ]);
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:user', // Pastikan kolom ini ada di database
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user', // Pastikan kolom ini ada di database
            'password' => 'required|string|min:8',
        ]);
        
        
    
        // Buat pengguna baru
        User::create([
            'username' => $validatedData['username'],
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'Admin berhasil ditambahkan.');
    }
    


    public function edit($id)
    {
        $user = user::findOrFail($id); // Mencari user berdasarkan ID
        return view('admin.manajemen-admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    // Validasi dan update data
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255|unique:user,nama,' . $id,
        'email' => 'required|email|max:255|unique:user,email,' . $id,
        'password' => 'nullable|string|min:8', // Biarkan kosong jika tidak diubah
    ]);

    $user = User::findOrFail($id); // Mencari user berdasarkan ID di tabel user
    $user->nama = $validatedData['nama'];
    $user->email = $validatedData['email']; // Update email
    if ($validatedData['password']) {
        $user->password = bcrypt($validatedData['password']);
    }
    $user->save();

    return redirect()->route('users.index')->with('success', 'Admin berhasil diubah.');
}


    

    public function destroy($id)
    {
        $user = user::findOrFail($id); // Mencari user berdasarkan ID di tabel user
        $user->delete();

        // Redirect ke halaman konfirmasi penghapusan
        return redirect()->route('users.index')->with('success', 'Admin berhasil dihapus.');
    }
}