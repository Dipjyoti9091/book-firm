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
    <title>ADD SUBCATEGORY</title>
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
                <h2 class="text-center mb-4">ADD BOOK SUB CATEGORY HERE</h2>
            </div>
            <form action="{{ route('store_subcategory') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="category">Book Category: </label>
                    <select name="category_id" id="category" class="form-select">
                        <option value="">Select The Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subcategory">Book Sub Category: </label>
                    <input type="text" class="form-control" name="subcategory" id="subcategory"
                        placeholder="Enter The Book Sub Category">
                </div>
                <div class="mb-3">
                    <label for="category_description">Sub Category Description:</label>
                    <textarea name="subcategory_description" id="subcategory_description" class="form-control"
                        placeholder="Add Your Sub Category Description Here" cols="30" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
<link rel="stylesheet" href="{{ asset('/assets/css/file.css') }}">
