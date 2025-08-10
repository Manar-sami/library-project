<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:authors,code',
            'country' => 'required|string|max:100',
            'books_count' => 'nullable|integer|min:0',
        ]);

        Author::create($data);

        return redirect()->route('authors.index')->with('success', 'Author created successfully');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => "required|string|max:50|unique:authors,code,{$author->id}",
            'country' => 'required|string|max:100',
            'books_count' => 'nullable|integer|min:0',
        ]);

        $author->update($data);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
