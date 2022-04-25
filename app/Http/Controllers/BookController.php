<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::orderBy('created_at', 'desc');
        $books = $books->paginate(10);

        return view('book.index', compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
        $validated = $request->validated();
        $book = new Book;
        $book->title = $request->title;
        $book->description= $request->description;
        $book->year_publication = $request->year_publication;
        $book->edition_home = $request->edition_home;
        $book->edition_date = $request->edition_date;
        if ($request->hasFile('image')){
            $book->image = $request->file('image')->store('images/books');
        }

        $book->save();
        return redirect()->route('book.index')->with('info', 'Livre sauvegardé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $book->title = $request->title;
        $book->description= $request->description;
        $book->year_publication = $request->year_publication;
        $book->edition_home = $request->edition_home;
        $book->edition_date = $request->edition_date;
        if ($request->hasFile('image')){
            $book->image = $request->file('image')->store('images/books');
        }

        $book->save();
        return redirect()->route('book.index')->with('info', 'Livre sauvegardé avec succès');
    }
    

    public function book_author(Request $request, Book $book, Author $author)
    {
        $book->author->save();
        return redirect()->route('book.index')->with('info', 'Informations du livre sauvegardées avec succès');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
