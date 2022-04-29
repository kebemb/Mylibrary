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
        $books = $books->paginate(10);
        return view('home', [
            'categories' => $categories],[
                'books' => $books]);
    }

    // public function show($livres)
    // {
    //     $category = Category::where('livres', $livres)->firstOrFail();
    //     dd($category);
    //     return view('category', [
    //         'category' => $category
    //     ]);
    // }
}
