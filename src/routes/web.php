<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('welcome');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/{books_id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/books/{books_id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{books_id}', [BookController::class, 'update'])->name('books.update');

?>