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

        th[data-column] {
        cursor: pointer;
    }

    th.sorted-asc::after {
        content: '\25B2'; /* Up arrow symbol */
        margin-left: 5px;
    }

    th.sorted-desc::after {
        content: '\25BC'; /* Down arrow symbol */
        margin-left: 5px;
    }

    .menu-container {
  position: relative;
  display: inline-block;
  margin-right: 20px; /* Add some spacing between menu containers */
}

.menu-button {
    max-width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.sub-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.sub-menu li {
  padding: 12px 16px;
  list-style: none;
}

.sub-menu li a {
  color: black;
  text-decoration: none;
  display: block;
}

.sub-menu li a:hover {
  background-color: #f1f1f1;
}

</style>


<head>
    <!-- Other meta tags and CSS stylesheets -->
    <!-- ... -->

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>



    <div class="container">
        <h1>Yaraku Web Developer Assignment</h1>


        <div class="container">
            <div class="row">
            <div class="col-sm-8">
               
                  
            </div>
            <div class="col-sm-4">

                <div class="menu-container">
                    <button class="menu-button">Export CSV</button>
                    <ul class="sub-menu">
                      <li><a href="{{ route('export.books.csv') }}" >Title and Author</a></li>
                      <li><a href="#">Titles</a></li>
                      <li><a href="#">Authors</a></li>
                    </ul>
                  </div>
                  
                  <div class="menu-container">
                    <button class="menu-button">Export XML</button>
                    <ul class="sub-menu">
                      <li><a href="{{ route('export.books.xml') }}">Title and Author</a></li>
                      <li><a href="#">Titles</a></li>
                      <li><a href="#">Authors</a></li>
                    </ul>
                  </div>
        
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
        <input type="text" id="searchInput" class="form-control" placeholder="Search by Title or Author">
        <table class="table table-striped mt-3" id="booksTable">
            <thead>
                <tr>
                    <th data-column="title">Title</th>
                    <th data-column="author">Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}
                         <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                            <div class="card card-body">
                                <form action="{{ route('books.update', $book->books_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text"  name="author"  class="form-control" value="{{ $book->author }}">
                                    <br>
                                    <button class="btn btn-secondary" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
                            Edit
                        </button>
                       
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
  $(".menu-button").click(function() {
    // Close all other open submenus
    $(".sub-menu").not($(this).next(".sub-menu")).hide();
    
    // Toggle the display of the clicked menu's submenu
    $(this).next(".sub-menu").toggle();
  });
});
</script>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val();

        $.ajax({
            url: "{{ route('books.search') }}",
            method: "GET",
            data: { searchTerm: searchTerm },
            success: function(data) {
                // Replace the table body with the search results
                $('#booksTable tbody').html(data);
            }
        });
    });
});
</script>

    
<script>
    $(document).ready(function() {
        // Add a click event handler to table headers
        $('th[data-column]').on('click', function() {
            var column = $(this).data('column');
            sortTableByColumn(column);
    
            // Toggle sorting class on the clicked header
            $('th[data-column]').not(this).removeClass('sorted-asc sorted-desc');
            $(this).toggleClass('sorted-asc sorted-desc');
        });
    
        // Function to sort table data
        function sortTableByColumn(column) {
            var $tbody = $('#booksTable tbody');
            var rows = $tbody.find('tr').get();
    
            rows.sort(function(a, b) {
                var aValue = $(a).find('td[data-column="' + column + '"]').text().toUpperCase();
                var bValue = $(b).find('td[data-column="' + column + '"]').text().toUpperCase();
    
                if ($(a).hasClass('sorted-desc')) {
                    return aValue < bValue ? 1 : -1;
                } else {
                    return aValue > bValue ? 1 : -1;
                }
            });
    
            // Detach and reattach the sorted rows to preserve event handlers and elements
            $tbody.empty();
            for (var i = 0; i < rows.length; i++) {
                $tbody.append(rows[i]);
            }
        }
    });
    </script>
    
    
    

    



