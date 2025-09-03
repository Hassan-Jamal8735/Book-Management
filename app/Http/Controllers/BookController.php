<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('categories');

        if ($request->has('category')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        $books = $query->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'published_date' => 'required|date',
            'book_image' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('book_image')) {
            $validated['book_image'] = $request->file('book_image')->store('books', 'public');
        }

        $validated['user_id'] = auth()->id();

        $book = Book::create($validated);
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'published_date' => 'required|date',
            'book_image' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('book_image')) {
            $validated['book_image'] = $request->file('book_image')->store('books', 'public');
        }

        $book->update($validated);
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
