<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();

        if($genres->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found!'
            ]);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Get All Genres',
            'data' => $genres
        ], 200);
    }

    public function store(Request $request) {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. insert data
        $genres = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 4. response
        return response()->json([
            'success' => true,
            'message' => 'New Author added successfully!',
            'data' => $genres
        ], 201);
    }
}
