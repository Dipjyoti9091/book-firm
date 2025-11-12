{{-- {{ dd($sub_category_data) }} --}}

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
    <title>Edit Subcategory</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 d-flex justify-content-start">
                <a href="{{ route('list_subcategory') }}" class="btn btn-dark">Show Subcategory</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ route('add_subcategory') }}" class="btn btn-dark">Create Subcategory</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card p-4">
            <div>
                <h2 class="text-center mb-4">EDIT SUBCATEGORY</h2>
            </div>
            <form action="{{ route('update_subcategory') }}" method="post">
                @csrf
                <input type="hidden" name="id" required value="{{ $subcategory->id }}">
                <div class="mb-3">
                    <label for="category">Book Category: </label>
                    <select name="category_id" id="category" class="form-select">
                        <option value="">Select The Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subcategory">Subcategory:</label>
                    <input type="text" class="form-control" value="{{ $subcategory->name }}" name="subcategory"
                        id="subcategory" placeholder="Enter Your Task">
                </div>

                <div class="mb-3">
                    <label for="category_description">Subcategory Description:</label>
                    <textarea name="subcategory_description" id="subcategory_description" class="form-control"
                        placeholder="Enter Your Task Description Here" cols="30" rows="5">{{ $subcategory->description }}</textarea>
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
