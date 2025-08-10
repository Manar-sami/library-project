<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Library;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $books = Book::with(['author', 'library'])->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    $authors = Author::all();
    $libraries = Library::all();
    return view('books.create', compact('authors', 'libraries'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'library_id' => 'required|exists:libraries,id',
            'price' => 'required|numeric|min:0',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $data['cover_path'] = $path;
        }

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
     $authors = Author::all();
        $libraries = Library::all();
        return view('books.edit', compact('book', 'authors', 'libraries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
         $data = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'library_id' => 'required|exists:libraries,id',
            'price' => 'required|numeric|min:0',
            'cover' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($book->cover_path) {
               \Storage::disk('public')->delete($book->cover_path);
            }
            $path = $request->file('cover')->store('covers', 'public');
            $data['cover_path'] = $path;
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
     if ($book->cover_path) {
            \Storage::disk('public')->delete($book->cover_path);
        }
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
