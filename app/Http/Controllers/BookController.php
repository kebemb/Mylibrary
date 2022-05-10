<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Examplaire;
use App\Http\Requests\StoreBookRequest;


use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;

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
        $nomcategories = Category::all();
        return view('book.create', compact('authors','nomcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $validated = $request->validated();
        $book = new Book;
        $book->title = $request->title;
        $book->description= $request->description;
        $book->year_publication = $request->year_publication;
        $book->edition_home = $request->edition_home;
        $book->edition_date = $request->edition_date;

        if ($file = $request->file('image')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/books/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $book->image = $image;
        }

        $book->category_id = $request->category_id;
        $book->save();
        $examplaire = new Examplaire;
        $examplaire->nombre_exemplaires = 1;
        $examplaire->book_id = $book->id;
        $examplaire->save();
        return redirect()->route('books.index')->with('info', 'Livre sauvegardé avec succès');
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
        $nomcategories = Category::all();
        return view('book.edit', compact('book','nomcategories'));
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
        
        if ($file = $request->file('image')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/books/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $book->image = $image;
        }


        $book->save();
        return redirect()->route('books.index')->with('info', 'Livre sauvegardé avec succès');
    }
    

    public function book_author(Request $request, Book $book, Author $author)
    {
        $book->author->save();
        return redirect()->route('books.index')->with('info', 'Informations du livre sauvegardées avec succès');
    }
    /** 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('warning', "Le livre a été supprimé!");
    }
}
