<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found!'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Authors',
            'data' => $authors
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. insert data
        $authors = Author::create([
            'name' => $request->name,
            'city' => $request->city,
        ]);

        // 4. response
        return response()->json([
            'success' => true,
            'message' => 'New Author added successfully!',
            'data' => $authors
        ], 201);
    }
}
