<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function index()
    {
        try {
            $images = Image::with('gallery')->get();
            
            return response()->json([
                'status' => 'success',
                'data' => $images
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
                'gallery_id' => 'required|exists:galleries,id',
                'tittle' => 'required|string|max:255',
            ]);

            // Upload file
            $path = $request->file('file')->store('public/photos');

            // Simpan ke database dengan explicit values
            $foto = Image::create([
                'gallery_id' => $validated['gallery_id'],
                'file' => $path,
                'tittle' => $validated['tittle']
            ]);

            // Debug info
            \Log::info('Data yang akan disimpan:', [
                'gallery_id' => $validated['gallery_id'],
                'file' => $path,
                'tittle' => $validated['tittle']
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Foto berhasil diupload',
                'data' => $foto
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    // Menghapus foto
    public function destroy($id)
    {
        // Menemukan foto berdasarkan ID
        $foto = Image::find($id);

        // Jika foto tidak ditemukan, kembalikan error
        if (!$foto) {
            return response()->json(['message' => 'Photo not found'], 404);
        }

        // Menghapus foto dari penyimpanan
        Storage::delete($foto->file);

        // Menghapus foto dari database
        $foto->delete();

        return response()->json(['message' => 'Photo deleted successfully']);
    }
}
