<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pictures = Picture::with(['author','resolutions'])->get();
        return response()->json($pictures);
        //return Picture::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            // resolution_id
            // type_id
        ]);
        
        $picture = Picture::create($validatedData);
        return response()->json($picture, 201);
    }
    
    public function show(Picture $picture)
    {
        $picture->load(['author', 'resolutions', 'types']);
        return response()->json($picture);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);
        
        $picture->update($validatedData);
        return response()->json($picture);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return response()->json(null, 204);
    }
}
