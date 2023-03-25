<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\regsiterController;
use App\Http\Middleware\isAdmin;

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
// Route::get('/create-book', [BookController::class, 'viewCreateBook'])->name('create.view')->middleware(isAdmin::class);
// Route::get('/create-book', [BookController::class, 'viewCreateBook'])->name('create.view')->middleware(['isAdmin']);
// Route::post('/create-book-post', [BookController::class, 'store'])->name('create.post');

Route::middleware(['isAdmin', 'auth'])->group(
    function () {
        Route::get('/create-book', [BookController::class, 'viewCreateBook'])->name('create.view');
        Route::post('/create-book-post', [BookController::class, 'store'])->name('create.post');
    }
);

// Update Book View
Route::get('/update-book/{id}', [BookController::class, 'editView'])->name('update.book.view');

//udpate book data
Route::patch('/update/{$id}', [BookController::class, 'edit'])->name('update.book');

//delete
Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('deleteBook');

//ccategory
Route::get('/create-category', [CategoryController::class, 'viewCreateCategory'])->name('category.view');

Route::post('/create-category', [CategoryController::class, 'create'])->name('category.create');


Route::get('/author', [AuthorsController::class, 'index'])->name('author.view');
Route::post('/author-create', [AuthorsController::class, 'create'])->name('author.create');

// //login view and controller
// Route::get('/login', [loginController::class, 'index']);
// Route::post('/login/now', [loginController::class, 'login'])->name('login');

// //register view and controller
// Route::get('/register', [regsiterController::class, 'registerView'])->name('register.view');
// Route::post('/register/now', [regsiterController::class, 'register'])->name('register');

//logout
// Route::post('/logout', [loginController::class, 'logout'])->name('logout');

//breezee
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
