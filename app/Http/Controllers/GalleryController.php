<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ambil data semua gallery
        $galleries = Gallery::all();

        //Tampilkan view index untuk menampilkan semua data gallery
        return view('admin.galleries.index', [
            'tittle' => 'Galleri Foto',
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //Ambil semua data post
        $posts =Post::all();

        //Tampilkan view form tambah gallery
        return view('admin.galleries.create',[
            'tittle' => 'Tambah Galleri Foto',
            'posts' => $posts, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'status' => 'required|in:aktif,tidak-aktif',
        ]);
    
        // Buat gallery baru
        Gallery::create([
            'post_id' => $validated['post_id'],
            'status' => $validated['status'],
            'position' => Auth::id(), // Tambahkan ID pengguna yang sedang login
        ]);
    
        return redirect()->route('galleries.index')
            ->with('success', 'Album berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
{
    // Tampilkan view detail gallery
    return view('admin.galleries.show', [
        'title' => 'Detail Galeri Foto',
        'gallery' => $gallery,
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {

         //Ambil semua data post
         $posts =Post::all();

        //Tampilkan view form edit gallery
        return view('admin.galleries.edit', [
            'tittle' => 'Edit Galeri Foto',
            'gallery' => $gallery,
            'posts' => $posts, 
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        // Validasi data
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'status' => 'required|string',
        ]);
    
        // Update data galeri
        $gallery->update([
            'post_id' => $request->post_id,
            'position' => Auth::id(), // Pastikan ini selalu diisi dengan ID pengguna yang login
            'status' => $request->status,
        ]);
    
        return redirect('/galleries')->with('success', 'Galleri Foto berhasil diperbarui');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //Hapus data gallery
        $gallery->delete();

        //Rediract ke halaman index gallery
        return redirect('/galleries')->with('success', 'Galleri Foto berhasil ditambahkan');
   
    }
}