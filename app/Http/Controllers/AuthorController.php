<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
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

    public function show(string $id): JsonResponse
    {
        $authors = Author::find($id);

        if (!$authors) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail author',
            'data' => $authors
        ], 200);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        // 1. mencari data
        $authors = Author::find($id);

        if (!$authors) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found!'
            ], 404);
        }

        // 2. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. siapkan data yang ingin diupdate
        $data = [
            'name' => $request->name,
            'city' => $request->city,
        ];

        // 4. update data baru ke database
        $authors->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully!',
            'data' => $authors
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $authors = Author::find($id);

        if (!$authors) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found!'
            ], 404);
        }

        $authors->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete author'
        ], 200);
    }
}
