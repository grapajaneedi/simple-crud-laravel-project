<style>

    

</style>
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
                        <input type="text" name="author" class="form-control" value="{{ $book->author }}">
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
