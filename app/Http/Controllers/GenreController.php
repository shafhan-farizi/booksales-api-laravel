<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'message' => 'Get All Genres',
            'data' => $genres
        ], 200);
    }
}
