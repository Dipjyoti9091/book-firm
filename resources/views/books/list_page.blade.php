<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book List Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 d-flex justify-content-start">
                <a href="{{ route('add_page') }}" class="btn btn-dark">Create</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ route('logout') }}" class="btn btn-dark">Logout</a>
            </div>
        </div>
        <br>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Book Title</th>
                        <th scope="col">Book Author</th>
                        <th scope="col">Book Price</th>
                        <th scope="col">Book Stock</th>
                        <th scope="col">Book Description</th>
                        <th scope="col">Book Cover Image</th>
                        <th scope="col">Book Category</th>
                        <th scope="col">Book Subcategory</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @if ($book_lists->isNotEmpty())
                    @foreach ($book_lists as $book)
                        <tbody>
                            <tr>
                                <td><a
                                        href="{{ route('edit_page', ['id' => base64_encode($book->id)]) }}">{{ $book->title }}</a>
                                </td>
                                <td>{{ $book->author }}</td>
                                <td> {{ $book->price }} </td>
                                <td> {{ $book->stock }}</td>
                                <td>{{ $book->description }}</td>
                                <td><img src="{{ asset('storage/' . $book->cover_image) }}" height="75px"
                                        width="75px" alt="book_cover"></td>
                                <td>{{ $book->Category->name }}</td>
                                <td>{{ $book->Subcategory->name }}</td>
                                <td>
                                    <ul>
                                        <a href="{{ route('edit_page', ['id' => base64_encode($book->id)]) }}"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </a>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                @else
                    <td colspan="6" align="center" style="color: red">No Record Found</td>
                @endif
            </table>
            {{ $book_lists->links() }}
        </div>
    </div>
</body>

</html>
