{{-- {{ dd($book_data) }} --}}
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
    <title>EDIT BOOK DETAILS</title>
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
                <h2 class="text-center mb-4">EDIT BOOK DETAILS HERE</h2>
            </div>
            <form action="{{ route('update_page') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Pass the currently saved subcategory ID to JS using a data attribute or a hidden input --}}
                <input type="hidden" id="initialSubcategoryId"
                    value="{{ old('subcategory_id', $book_data->subcategory_id ?? '') }}">
                <input type="hidden" name="id" value="{{ $book_data->id }}">
                <div class="mb-3">
                    <label for="title">Book Title:</label>
                    <input type="text" class="form-control" name="title" id="title"
                        placeholder="Enter The Book Name" value="{{ $book_data->title }}"
                        @error('title')
                            is-invalid
                        @enderror>
                    @error('title')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" name="author" id="author"
                        placeholder="Enter The Author Name" value="{{ $book_data->author }}"
                        @error('author')
                            is-invalid
                        @enderror>
                    @error('author')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" id="price"
                        placeholder="Enter Book Price" value="{{ $book_data->price }}"
                        @error('price')
                            is-invalid
                        @enderror>
                    @error('price')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="initial_stock">Initial Stock:</label>
                    <input type="number" class="form-control" name="initial_stock" id="initial_stock"
                        placeholder="Enter Initial Stock" value="{{ $book_data->stock }}">
                </div>
                <div class="mb-3">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-select">
                        <option value="">Choose Book Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $book_data->category_id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subcategory">Sub-Category:</label>
                    <select name="subcategory_id" id="subcategory" class="form-select">
                        <option value="">Choose Sub Category</option>
                    </select>
                </div>
                @if ($book_data->cover_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $book_data->cover_image) }}" alt="Cover Photo"
                            style="max-width: 200px; height:auto">
                    </div>
                @else
                    <p>No Cover Photo Choosen</p>
                @endif
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
                        placeholder="Add Your Book Description Here" cols="30" rows="5">{{ $book_data->description }}</textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Store the initial subcategory ID from the hidden input
        const initialSubcategoryId = $('#initialSubcategoryId').val();

        function loadSubcategories(categoryId, selectedSubId = null) {
            if (!categoryId) {
                $('#subcategory').empty().append('<option value="">Choose Sub Category</option>');
                return;
            }

            $.ajax({
                url: "{{ route('getSubcategories') }}",
                type: "GET",
                data: {
                    category_id: categoryId
                },
                success: function(response) {
                    $('#subcategory').empty().append(
                        '<option value="">Choose Sub Category</option>');

                    $.each(response, function(id, name) {
                        // Check if the current ID matches the selectedSubId passed in
                        const isSelected = (id == selectedSubId) ? 'selected' : '';

                        $('#subcategory').append(
                            `<option value="${id}" ${isSelected}>${name}</option>`
                        );
                    });
                }
            });
        }

        // 1. Handle user changes to the category dropdown
        $('#category').on('change', function() {
            let categoryId = $(this).val();
            // When the user manually changes it, don't pass an initially selected ID
            loadSubcategories(categoryId);
        });

        // 2. Initial load for the Edit Page:
        // Check if a category was already selected when the page loaded
        const initialCategoryId = $('#category').val();
        if (initialCategoryId) {
            // Trigger the loading function immediately, passing the saved subcategory ID
            loadSubcategories(initialCategoryId, initialSubcategoryId);
        }

    });
</script>
<link rel="stylesheet" href="{{ asset('/assets/css/file.css') }}">

{{-- {{ u need to trigger the AJAX call automatically when the page loads if the book_data->category_id has a value. This will pre-populate the subcategory dropdown with the correct options, and then you can select the specific subcategory using the saved book_data->subcategory_id.}} --}}
