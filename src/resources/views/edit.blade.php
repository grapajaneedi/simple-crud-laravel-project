<!-- resources/views/books/edit.blade.php -->

{{-- @extends('layouts.app')

@section('content') --}}
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->books_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
{{-- @endsection --}}
