<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Models\Book;


// Route::get('vw_login', function () {
//     return view('users.vw_login');
// });

// Route::get('vw_registrasi', function () {
//     return view('users.vw_registrasi');
// });

// Route::get('vw_forgot', function () {
//     return view('users.vw_forgot');
// });

// Route::get('/',[UserController::class,'index']);

// Route::get('/dashboard', function () {
//     return view('users.vw_dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [BookController::class, 'landing_page']);
Route::get('book_search_lp', [BookController::class, 'book_search_lp']);


Route::get('dashboard', [UserController::class, 'show'])->Middleware(['auth', 'verified'])->name('dashboard');


Route::get('vw_book', [BookController::class, 'index'])->Middleware(['auth', 'verified'])->name('vw_book');

Route::get('create_book', [BookController::class, 'create'])->Middleware(['auth', 'verified']);

Route::post('add_book', [BookController::class, 'add_book'])->Middleware(['auth', 'verified']);

Route::get('delete_book/{id}', [BookController::class, 'delete_book'])->Middleware(['auth', 'verified']);

Route::get('edit_book/{id}', [BookController::class, 'edit_book'])->Middleware(['auth', 'verified']);

Route::post('update_book/{id}', [BookController::class, 'update_book'])->Middleware(['auth', 'verified']);

Route::get('user_search', [UserController::class, 'user_search'])->Middleware(['auth', 'verified']);

Route::get('book_search', [BookController::class, 'book_search'])->Middleware(['auth', 'verified']);

Route::get('show_profile', [ProfileController::class, 'show_profile'])->Middleware(['auth', 'verified']);





Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
