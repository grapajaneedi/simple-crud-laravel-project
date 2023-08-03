<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/x-icon">
    
    <!-- Add your CSS or external stylesheets here -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

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
            <div class="col-sm-4" style="text-align: right;">
                <div class="menu-container">
                    <button class="menu-button">Export CSV</button>
                    <ul class="sub-menu">
                      <li><a href="{{ route('export.books.csv') }}" >Title and Author</a></li>
                      <li><a href="{{ route('export.books.csv.title') }}">Titles</a></li>
                      <li><a href="{{ route('export.books.csv.author') }}">Authors</a></li>
                    </ul>
                  </div>
                  <div class="menu-container">
                    <button class="menu-button">Export XML</button>
                    <ul class="sub-menu">
                      <li><a href="{{ route('export.books.xml') }}">Title and Author</a></li>
                      <li><a href="{{ route('export.books.xml.title') }}">Titles</a></li>
                      <li><a href="{{ route('export.books.xml.author') }}">Authors</a></li>
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
    
    
    

    



