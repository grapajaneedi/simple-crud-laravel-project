<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Writer;
use Illuminate\Support\Facades\Response;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $searchTerm = $request->input('searchTerm');
        $books = Book::when($searchTerm, function ($query, $searchTerm) {
        return $query->where('title', 'like', '%' . $searchTerm . '%')
                     ->orWhere('author', 'like', '%' . $searchTerm . '%');
    })->get();

    if ($request->ajax()) {
        return view('books.search_results', compact('books'));
    }

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

    return view('books.search_results', compact('books'));
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
    public function edit($books_id)
{
    $book = Book::find($books_id);

    if (!$book) {
        return redirect()->route('books.index')->with('error', 'Book not found.');
    }

    return view('welcome', compact('books'));
}



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
     public function update(Request $request, $books_id)
     {
        $book = Book::find($books_id);
         $validatedData = $request->validate([
             'author' => 'required|max:100',
         ]);
     
        
         if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found.');
         }
     
         $book->update($validatedData);
         dd('Updated successfully');

         // Redirect to the updated book details or any other page you prefer
         return view('welcome', compact('books'));
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
     

public function exportBooksToCsv()
    {
        // Fetch the data from the "books" table
        $books = Book::all();

        // Create a new CSV Writer instance
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Insert the header row
        $csv->insertOne(['Title', 'Author']);

        // Insert the data rows
        foreach ($books as $book) {
            $csv->insertOne([$book->title, $book->author]);
        }

        // Set the response headers for file download
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="books.csv"',
        ];

        // Return the CSV file as a download response
        return Response::make($csv->__toString(), 200, $headers);
    }
  
}
