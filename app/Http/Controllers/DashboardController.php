<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGaleri = Gallery::count();
        $jumlahAgenda = Post::where('category_id', 1)->count();
        $jumlahInformasi = Post::where('category_id', 2)->count();
        $jumlahAdmin = User::count();

        return view('admin.dashboard.index', compact(
            'jumlahGaleri',
            'jumlahAgenda',
            'jumlahInformasi',
            'jumlahAdmin'
        ));
    }
} 