<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/categories', [MainController::class, 'index'])->name('categories');

Auth::routes();

Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware('admin')->name('categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->middleware('admin')->name('categories.create');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->middleware('admin')->name('categories.store');
Route::delete('/admin/categories/{category:id}/delete', [CategoryController::class, 'delete'])->middleware('admin')->name('categories.delete');
Route::get('/admin/categories/{category:id}/edit', [CategoryController::class, 'edit'])->middleware('admin')->name('categories.edit');
Route::put('/admin/categories/{category:id}/update', [CategoryController::class, 'update'])->middleware('admin')->name('categories.update');
