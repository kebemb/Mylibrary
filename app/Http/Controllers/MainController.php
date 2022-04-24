<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories', [
            'categories' => $categories]);
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
