<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BookController::class, 'show'])->name('home');

//view & create book
Route::get('/create-book', [BookController::class, 'viewCreateBook'])->name('create.view');
Route::post('/create-book-post', [BookController::class, 'store'])->name('create.post');

// Update Book View
Route::get('/update-book/{id}', [BookController::class, 'editView'])->name('update.book.view');

//udpate book data
Route::patch('/update/{$id}', [BookController::class, 'edit'])->name('update.book');

//delete
Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('deleteBook');

//ccategory
Route::get('/create-category', [CategoryController::class, 'viewCreateCategory'])->name('category.view');

Route::post('/create-category', [CategoryController::class, 'create'])->name('category.create');
