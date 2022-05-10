<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;

class MainController extends Controller
{
    // public function home()
    // {
    //     return view('home');
    // }

    public function index()
    {
        $categories = Category::all();
        $books = Book::orderBy('created_at', 'desc');
        $books = $books->paginate(2);
        return view('home', [
            'categories' => $categories],[
                'books' => $books]);
    }

    public function recherche(Request $request,Category $category)
    {

        $booksres = Book::join('categories', 'books.category_id', '=','categories.id' )
                        ->where('categories.id', $category->id)
                        ->get();
                        return view('library', [
                                    'booksres' => $booksres]);
        
    }

    public function detail(Request $request,Book $book)
    {
        $booksres = Book::where('id', $book->id)->get();
        return view('detail', [
            'booksres' => $booksres]);
        
    }

    // cette permet de se rediger vers la page d'emprunt
    public function emprunter(Request $request, Book $book) {
        $book = Book::where('id', $book->id)->get();
        return view('front.emprunt', ['book' => $book]);
    }
}
