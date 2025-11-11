{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
{{-- <div class="container">
    <h2>Add Book</h2>

    <form action="{{ route('store_page') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Book Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div> --}}
{{-- @endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">
    <title>ADD A BOOK</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 d-flex justify-content-start">
                <a href="#" class="btn btn-dark">BUTTON TO ADD</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="#" class="btn btn-dark">BUTTON TO ADD</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card p-4">
            <div>
                <h2 class="text-center mb-4">ADD BOOK DETAILS HERE</h2>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Book Title: <span class="required_task">*</span> </label>
                    <input type="text" class="form-control" name="title" id="title"
                        placeholder="Enter The Book Name"
                        @error('task')
                            is-invalid
                        @enderror>
                    @error('title')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author">Author: <span class="required_task">*</span> </label>
                    <input type="text" class="form-control" name="author" id="author"
                        placeholder="Enter The Book Name"
                        @error('task')
                            is-invalid
                        @enderror>
                    @error('author')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category">Category: <span class="category">*</span></label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Choose Book Category</option>
                        <option value="less">Less</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sub_category">Sub-Category: <span class="sub_category">*</span></label>
                    <select name="sub_category" id="category" class="form-select">
                        <option value="">Choose Sub Category</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fileToUpload">Select file to upload:</label><br>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="book_description">Book Description:</label>
                    <textarea name="book_description" id="book_description"
                        class="form-control @error('book_description')
                       is-invalid 
                    @enderror"
                        placeholder="Add Your Book Description Here" cols="30" rows="5"></textarea>
                    @error('book_description')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>

<link rel="stylesheet" href="{{ asset('/assets/css/file.css') }}">
