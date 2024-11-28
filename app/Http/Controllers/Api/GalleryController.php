<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the galleries.
     */
    public function index()
    {
        // Get all galleries
        $galleries = Gallery::all();

        // Return JSON response
        return response()->json([
            'message' => 'Success',
            'data' => $galleries
        ]);
    }

    /**
     * Store a newly created gallery in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data, ensure 'status' is either 'aktif' or 'tidak aktif'
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'status' => 'required|in:aktif,tidak aktif',  // corrected validation for status
        ]);

        // Get the ID of the logged-in user
        $userId = Auth::id();

        // Create the new gallery record
        $gallery = Gallery::create([
            'post_id' => $request->post_id,
            'position' => $userId,
            'status' => $request->status,  // status from the request
        ]);

        // Return JSON response
        return response()->json([
            'message' => 'Galeri Berhasil Di buat',
            'data' => $gallery
        ]);
    }

    /**
     * Display the specified gallery.
     */
    public function show($id)
    {
        // Find the gallery by ID or fail with a 404 response
        $gallery = Gallery::findOrFail($id);

        // Return JSON response with the gallery data
        return response()->json([
            'message' => 'Success',
            'data' => $gallery
        ]);
    }

    /**
     * Update the specified gallery in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'status' => 'required|in:aktif,tidak aktif',  // corrected validation for status
        ]);

        // Find the gallery by ID or fail with a 404 response
        $gallery = Gallery::findOrFail($id);

        // Update the gallery record
        $gallery->update([
            'post_id' => $request->post_id,
            'position' => Auth::id(),
            'status' => $request->status,  // status from the request
        ]);

        // Return JSON response with the updated gallery
        return response()->json([
            'message' => 'Galeri Berhasil updated',
            'data' => $gallery
        ]);
    }

    /**
     * Remove the specified gallery from storage.
     */
    public function destroy($id)
    {
        // Find the gallery by ID or fail with a 404 response
        $gallery = Gallery::findOrFail($id);

        // Delete the gallery record
        $gallery->delete();

        // Return JSON response
        return response()->json([
            'message' => 'Galeri Berhasil Hapus'
        ]);
    }
}
