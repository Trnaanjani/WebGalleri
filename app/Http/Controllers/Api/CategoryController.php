<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Menambah kategori baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required|string|max:255',
        ]);
    
        $category = Category::create([
            'tittle' => $validatedData['tittle'],
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
            'data' => $category,
        ]);
    }
    
    

    // Menampilkan kategori berdasarkan ID
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    // Mengupdate kategori
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $validated = $request->validate([
            'tittle' => 'required|string|max:255',
        ]);

        $category->update([
            'tittle' => $validated['tittle'],
        ]);

        return response()->json($category);
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
