<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ambil semua data post
        $posts = Post::all();

    

        //Tampilkan halaman index dan kirim data user
        return view('admin.posts.index', [
            'posts' => $posts,
            'tittle' => 'Post',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         //Ambil semua data klategori
         $categories = Category::all();

         //Tampilkan halaman create dan kirim data kategori
         return view ('admin.posts.create', [
            'categories' => $categories,
            'tittle' => 'Buat Post',
         ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan data post baru
        Post::create([
            'tittle' => $request->tittle,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(), //Ambil user yang sedang login
            'status' => $request->status,
        ]);

        //Redirect kehalaman index post
        return redirect('/posts')->with('success', 'Post berhasil ditambahkan.');
}
    
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         //Ambil semua data klategori
         $categories = Category::all();

         //Tampilkan halaman edit dan kirim data post dan kategori
         return view ('admin.posts.edit', [
            'post' =>$post,
            'categories' => $categories,
            'tittle' => 'Edit Post',
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Update data post
        $post->update([
            'tittle' => $request->tittle,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);
    
        // Redirect ke halaman index post
        return redirect('/posts')->with('success', 'Post berhasil diupdate');
    }
    
    public function destroy(Post $post)
    {
        // Hapus data post
        $post->delete();
    
        // Redirect ke halaman index post
        return redirect('/posts')->with('success', 'Post berhasil dihapus');
    }
    
}