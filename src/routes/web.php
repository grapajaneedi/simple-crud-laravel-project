<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('welcome');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/{books_id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::post('/books/{books_id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{books_id}', [BookController::class, 'update'])->name('books.update');
Route::get('/export-bookscsv', [BookController::class, 'exportBooksToCsv'])->name('export.books.csv');
Route::get('/export-bookscsvtitle', [BookController::class, 'exportBooksToCsvTitle'])->name('export.books.csv.title');
Route::get('/export-bookscsvauthor', [BookController::class, 'exportBooksToCsvAuthor'])->name('export.books.csv.author');
Route::get('/export-booksxml', [BookController::class, 'exportBooksToXml'])->name('export.books.xml');
Route::get('/export-booksxmltitle', [BookController::class, 'exportBooksToXmlTitle'])->name('export.books.xml.title');
Route::get('/export-booksxmlauthor', [BookController::class, 'exportBooksToXmlAuthor'])->name('export.books.xml.author');

?>