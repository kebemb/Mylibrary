<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamplaireController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index'])->name('home');
//Route::get('/categories', [MainController::class, 'index'])->name('categories');

Auth::routes();

//Routes admin
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('admin')->name('dashboard');

Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware('admin')->name('categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->middleware('admin')->name('categories.create');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->middleware('admin')->name('categories.store');
Route::delete('/admin/categories/{category:id}/delete', [CategoryController::class, 'delete'])->middleware('admin')->name('categories.delete');
Route::get('/admin/categories/{category:id}/edit', [CategoryController::class, 'edit'])->middleware('admin')->name('categories.edit');
Route::put('/admin/categories/{category:id}/update', [CategoryController::class, 'update'])->middleware('admin')->name('categories.update');


// routes des livres
Route::get('/admin/books', [BookController::class, 'index'])->middleware('admin')->name('books.index');
Route::get('/admin/books/create', [BookController::class, 'create'])->middleware('admin')->name('books.create');
Route::post('/admin/books/store', [BookController::class, 'store'])->middleware('admin')->name('books.store');
Route::delete('/admin/books/{book:id}/delete', [BookController::class, 'delete'])->middleware('admin')->name('books.delete');
Route::get('/admin/books/{book:id}/edit', [BookController::class, 'edit'])->middleware('admin')->name('books.edit');
Route::put('/admin/books/{book:id}/update', [BookController::class, 'update'])->middleware('admin')->name('books.update');

// etudiants
Route::get('/admin/students', [StudentController::class, 'index'])->middleware('admin')->name('students');
Route::get('/admin/students/create', [StudentController::class, 'create'])->middleware('admin')->name('students.create');
Route::post('/admin/students/store', [StudentController::class, 'store'])->middleware('admin')->name('students.store');
Route::delete('/admin/students/{student:id}/delete', [StudentController::class, 'destroy'])->middleware('admin')->name('students.delete');
Route::get('/admin/students/{student:id}/edit', [StudentController::class, 'edit'])->middleware('admin')->name('students.edit');
Route::put('/admin/students/{student:id}/update', [StudentController::class, 'update'])->middleware('admin')->name('students.update');

//authors
Route::get('/admin/authors', [AuthorController::class, 'index'])->middleware('admin')->name('authors.index');
Route::get('/admin/authors/create', [AuthorController::class, 'create'])->middleware('admin')->name('authors.create');
Route::post('/admin/authors/store', [AuthorController::class, 'store'])->middleware('admin')->name('authors.store');
Route::delete('/admin/authors/{author:id}/delete', [AuthorController::class, 'destroy'])->middleware('admin')->name('authors.delete');
Route::get('/admin/authors/{author:id}/edit', [AuthorController::class, 'edit'])->middleware('admin')->name('authors.edit');
Route::put('/admin/authors/{author:id}/update', [AuthorController::class, 'update'])->middleware('admin')->name('authors.update');

//authors
Route::get('/admin/exemplaires', [ExamplaireController::class, 'index'])->middleware('admin')->name('exemplaires.index');
Route::get('/admin/exemplaires/create', [ExamplaireController::class, 'create'])->middleware('admin')->name('exemplaires.create');
Route::post('/admin/exemplaires/store', [ExamplaireController::class, 'store'])->middleware('admin')->name('exemplaires.store');

 //Recherche book
 Route::get('/books/{category:id}/recherche', [MainController::class, 'recherche'])->name('book.recherche');

//detail
Route::get('/books/detail/{book:id}/', [MainController::class, 'detail'])->name('book.detail');
