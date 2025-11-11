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
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="category">Book Category: <span class="required_task">*</span> </label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Choose Book Category</option>
                        <option value="less">Less</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subcategory">Book Sub Category: <span class="required_task">*</span> </label>
                    <input type="text" class="form-control" name="subcategory" id="subcategory"
                        placeholder="Enter The Book Sub Category"
                        @error('subcategory')
                            is-invalid
                        @enderror>
                    @error('subcategory')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_description">Sub Category Description:</label>
                    <textarea name="subcategory_description" id="subcategory_description"
                        class="form-control @error('subcategory_description')
                       is-invalid 
                    @enderror"
                        placeholder="Add Your Sub Category Description Here" cols="30" rows="5"></textarea>
                    @error('subcategory_description')
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
