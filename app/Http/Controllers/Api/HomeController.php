<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with(['post', 'images'])
            ->whereHas('post')
            ->get()
            ->groupBy(function($gallery) {
                return $gallery->created_at->format('d F Y');
            });

        $informasi = Post::where('category_id', 1)
            ->latest()
            ->take(3)
            ->get();

        $agenda = Post::where('category_id', 2)
            ->latest()
            ->take(3)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'galleries' => $galleries,
                'informasi' => $informasi,
                'agenda' => $agenda
            ]
        ])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With')
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    public function getGaleri()
    {
        $images = Image::with('gallery.post')
            ->get()
            ->map(function($image) {
                $image->file_url = asset('images/' . $image->file);
                return $image;
            })
            ->groupBy('gallery_id');

        return response()->json([
            'status' => 'success',
            'data' => ['images' => $images]
        ])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With');
    }

    public function getAgenda()
    {
        try {
            $posts = Post::where('category_id', 2)
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => [
                    'posts' => $posts
                ]
            ], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getInformasi()
    {
        try {
            $posts = Post::where('category_id', 1)
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => [
                    'posts' => $posts
                ]
            ], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
