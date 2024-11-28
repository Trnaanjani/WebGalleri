<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', [
            'tittle' => 'Kategori',
            'categories' => Category::all(),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create', [
            'tittle' => 'Tambah Kategori',
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
    $request->validate([
        'tittle' => 'required',
    ]);

    // Simpan data ke dalam tabel categories
    Category::create([
        'tittle' => $request->tittle,
    ]);

    // Redirect ke halaman categories dengan pesan sukses
    return redirect('/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'tittle' => 'Edit Kategori',
            'category' => $category,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //validate request
        $request->validate([
            'tittle'=>'required',
        ]);

        //update data
        $category->update([
            'tittle'=>$request->tittle,
        ]);

        //redirectkehalaman kategori
        return redirect('/categories')->with('succes', 'kategori berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    // Hapus data kategori
    $category->delete();

    // Redirect ke halaman categories dengan pesan sukses
    return redirect('/categories')->with('success', 'Kategori berhasil dihapus');
}
}