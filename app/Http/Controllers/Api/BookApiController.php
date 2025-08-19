<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookApiController extends Controller
{
  public function index()
    {

        return Book::with('author')->get();
    }

    public function show($id)
    {

        return Book::with('author')->findOrFail($id);
    }
}
