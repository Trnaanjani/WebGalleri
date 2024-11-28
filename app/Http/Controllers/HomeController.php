<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        // Mengambil semua informasi tanpa batasan
        $informasi = Post::where('category_id', 1)
            ->orderBy('created_at', 'desc')  // Mengurutkan dari terbaru
            ->get();                         // Mengambil semua data

        // Mengambil semua agenda tanpa batasan
        $agenda = Post::where('category_id', 2)
            ->orderBy('created_at', 'desc')  // Mengurutkan dari terbaru
            ->get();                         // Mengambil semua data

        return view('home', compact('galleries', 'informasi', 'agenda'));
    }
}
