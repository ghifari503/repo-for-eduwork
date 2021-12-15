<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.book', [
            'publishers' => Publisher::select('id', 'name')->get(),
            'authors' => Author::select('id', 'name')->get(),
            'catalogs' => Catalog::select('id', 'name')->get()
        ]);
    }

    public function api()
    {
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'isbn' => 'required|integer',
            'title' => 'required|max:64',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'publisher_id' => 'required|exists:App\Models\Publisher,id',
            'author_id' => 'required|exists:App\Models\Author,id',
            'catalog_id' => 'required|exists:App\Models\Catalog,id',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        Book::create($attributes);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $attributes = $request->validate([
            'isbn' => 'required|integer',
            'title' => 'required|max:64',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'publisher_id' => 'required|exists:App\Models\Publisher,id',
            'author_id' => 'required|exists:App\Models\Author,id',
            'catalog_id' => 'required|exists:App\Models\Catalog,id',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $book->update($attributes);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
