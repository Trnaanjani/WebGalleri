<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    // Menambah post baru
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'tittle' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|integer|exists:categories,id',
        'user_id' => 'required|integer|exists:user,id',
        'status' => 'required|in:draft,published',
    ]);

    // Buat post baru
    $post = Post::create($validatedData);

    return response()->json([
        'message' => 'Post created successfully',
        'data' => $post,
    ], 201);
}

    

    // Menampilkan post berdasarkan ID
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    // Mengupdate post
    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'user_id' => 'required|exists:user,id',
        'status' => 'required|in:aktif,tidak aktif',  // Validasi status sebagai string 'aktif' atau 'tidak aktif'
    ]);

    // Cari post berdasarkan ID
    $post = Post::find($id);

    if (!$post) {
        return response()->json([
            'message' => 'Post not found',
        ], 404);
    }

    // Update post dengan data baru

    $post->category_id = $request->category_id;
    $post->user_id = $request->user_id;
    $post->status = $request->status;  // Simpan status sebagai string
    $post->save();

    // Berikan respons berhasil
    return response()->json([
        'message' => 'Post updated successfully',
        'data' => $post,
    ], 200);
}



    // Menghapus post
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getByCategory($id)
    {
        try {
            $posts = Post::where('category_id', $id)
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $posts
            ], 200)
            ->withHeaders([
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, PATCH, DELETE, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, X-Requested-With, Authorization, X-Token-Auth, X-CSRF-TOKEN',
                'Access-Control-Allow-Credentials' => 'true',
                'Access-Control-Max-Age' => '7200'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
