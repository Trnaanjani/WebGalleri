<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request){
        // Validasi data request
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,jpg,png,gif,svg,heic|max:2048',
            'tittle' => 'required|string|max:255',
        ]);
        
        // Ambil file yang diupload
        $file = $request->file('file');
        
        // Nama file
        $fileName = time() . '-' . $file->getClientOriginalName();

        // Pindahkan file ke folder public/images 
        $file->move(public_path('images'), $fileName);

        // Simpan data ke database
        Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $fileName,
            'tittle' => $request->tittle,
        ]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Foto berhasil ditambahkan!');
    }
    
    public function destroy($id)
    {
        // Ambil data image berdasarkan id
        $image = Image::find($id);
        
        // Hapus file dari folder public/images
        if ($image && file_exists(public_path('images/'. $image->file))) {
            unlink(public_path('images/' . $image->file));
        }
        
        // Hapus data dari database
        $image->delete();
        
        // Redirect ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Foto berhasil dihapus');
    }

    public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'file' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg,heic|max:2048',
        'tittle' => 'required|string|max:255',
    ]);

    // Cari data gambar berdasarkan ID
    $image = Image::findOrFail($id);

    // Jika file baru diunggah
    if ($request->hasFile('file')) {
        // Hapus file lama
        if (file_exists(public_path('images/' . $image->file))) {
            unlink(public_path('images/' . $image->file));
        }

        // Simpan file baru
        $file = $request->file('file');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);

        // Update nama file di database
        $image->file = $fileName;
    }

    // Update judul di database
    $image->tittle = $request->tittle;
    $image->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Foto berhasil diperbarui!');
}

}