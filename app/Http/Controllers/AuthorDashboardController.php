<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class AuthorDashboardController extends Controller
{
    public function index()
    {
        $books = Book::where('author_id', Auth::guard('author')->id())->get();

        return view('author.dashboard', compact('books'));
    }
}
