<!-- resources/views/welcome.blade.php -->

{{-- @extends('layouts.app')

@section('content')  --}}

<style>
    .container {
    margin-top: 20px;
  }
  
  h1 {
    font-size: 24px;
    margin-bottom: 10px;
  }
  
  .table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .table th,
  .table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
  }
  
  .table th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
  
  .table tbody tr:hover {
    background-color: #f9f9f9;
  }
  
  .btn {
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 4px;
    color: #fff;
    background-color: #007bff;
    border: none;
    cursor: pointer;
  }
  
 
  
  .btn-info {
    background-color: #17a2b8;
  }
  
  .btn-sm {
    font-size: 14px;
  }
  
  .btn-primary:hover,
  .btn-info:hover {
    background-color: #0056b3;
  }
  
        .add-book-form {
            width: 100%;
            margin: 0 auto;
            /* margin-left: 20px;
            margin-right: 20px; */
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 40%;
            padding: 8px 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            
        }

        .btn-success {
            text-align: center;
            display: block;
            
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
        }

        .btn-primary {
            text-align: center;
            display: block;
            
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h1>Yaraku Web Developer Assignment</h1>


        <div class="container">
            <div class="row">
            <div class="col-sm-8">
                
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Export Excel</button>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Export CSV</button>
            </div>
            
        </div>
        </div>

        <div class="container">
       
            <div class="col-sm-4">
            </div>
            <form action="{{ route('books.store') }}" method="POST" class="add-book-form">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>
               

                <div class="row">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-sm-4">
                       
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">Add Book</button>
                    </div>
                </div>
            </form>
            
        <br>
        <input type="text" id="searchTerm" class="form-control" placeholder="Search by Title or Author">
      
        <table class="table table-striped mt-3" id="booksTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <form action="{{ route('books.destroy', $book->books_id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        
            
            
            
            
        </table>
    </div>
{{-- @endsection --}}


@section('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

<script>
    $(document).ready(function() {
        // Function to update book list based on search input
        function updateBookList() {
            var searchTerm = $('#searchTerm').val();
    
            // Send AJAX request to the server for live search
            $.ajax({
                url: "{{ route('books.search') }}", // The route to the search method in BookController
                type: "GET",
                data: { searchTerm: searchTerm },
                dataType: "json",
                success: function(response) {
                    // Update the book list in the table with the new search results
                    var tableBody = '';
                    $.each(response, function(index, book) {
                        tableBody += '<tr>';
                        tableBody += '<td>' + book.title + '</td>';
                        tableBody += '<td>' + book.author + '</td>';
                        
                        tableBody += '</tr>';
                    });
                    $('#booksTable tbody').html(tableBody);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    
        // Bind the keyup event to the search input field
        $('#searchTerm').on('keyup', function() {
            updateBookList();
        });
    
        // Initialize the book list on page load
        updateBookList();
    });
    </script>

