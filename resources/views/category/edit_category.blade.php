<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Edit Category</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 d-flex justify-content-start">
                <a href="{{ route('list_category') }}" class="btn btn-dark">Show Category</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ route('add_category') }}" class="btn btn-dark">Create Category</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card p-4">
            <div>
                <h2 class="text-center mb-4">EDIT CATEGORY</h2>
            </div>
            <form action="{{ route('update_category') }}" method="post">
                @csrf
                <input type="hidden" name="id" required value="{{ $category->id }}">
                <div class="mb-3">
                    <label for="category_id">Category:</label>
                    <input type="text" class="form-control" value="{{ $category->name }}" name="category"
                        id="category_id" placeholder="Enter Category">
                </div>
                <div class="mb-3">
                    <label for="category_description">Category Description:</label>
                    <textarea name="category_description" id="category_description" class="form-control"
                        placeholder="Enter Category Description Here" cols="30" rows="5">{{ $category->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js">
</script>
<link rel="stylesheet" href="{{ asset('/assets/css/file.css') }}">
