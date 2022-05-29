<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Emprunt;
use App\Models\Author;
use App\Models\Category;

class AdminController extends Controller
{
     public function dashboard()
    {
        $nbBook = Book::count();
        $nbCat = Category::count();
        $nbEmp = Emprunt::count();
        $nbAuthors = Author::count();
        $lastEmprunts = Emprunt::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.dashboard', compact('nbBook', 'nbCat', 'nbAuthors', 'nbEmp', 'lastEmprunts'));
    } 
}
