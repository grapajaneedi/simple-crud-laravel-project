<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function search(Request $request)
     {
         $searchTerm = $request->input('searchTerm');
         $books = Book::where('title', 'like', '%' . $searchTerm . '%')
             ->orWhere('author', 'like', '%' . $searchTerm . '%')
             ->get();
     
         return response()->json($books);
     }
    
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
        ]);

        Book::create($validatedData);

        // Redirect to the updated list of books
        $books = Book::all();
        return view('welcome', compact('books'));
        // return redirect('index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $book->delete();
        // return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function destroy($books_id)
{
    $book = Book::find($books_id);

    if (!$book) {
        // Handle the case where the book is not found
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    $book->delete();
    $books = Book::all();
    return view('welcome', compact('books'));
}
     
  
}
