{{-- {{ dd($categories) }} --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sub Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    @keyframes blinking {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .blinking-text {
        animation: blinking 2s linear infinite;
    }
</style>


<body>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6 d-flex justify-content-start">
                <a href="#" class="btn btn-dark">BUTTON TO ADD</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{ route('add_subcategory') }}" class="btn btn-dark">ADD CATEGORY</a>
            </div>
        </div>
        <br>
        {{-- @if (session()->has('success'))
            <div class="alert alert-success" id="success-message" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif --}}
        {{-- <div>
            <span class="blinking-text">Welcome user --->> ({{ auth()->user()->email }})</span>
        </div> --}}
        <div class="p-3 mb-2 bg-dark text-center">
            <h3 class="text-white">SUBCATEGORY LISTING</h3>
        </div>
        {{-- <form action="{{ route('task.filter') }}" method="get">
            <div class="row"> --}}
        {{-- <div class="col-md-3">
                    <label>Filter By Date</label>
                    <input type="date" name="date" id="date" class="form-control"
                        value="{{ date('Y-m-d') }}">
                </div> --}}
        {{-- <div class="col-md-3">
                    <label>Filter By Priority</label>
                    <select name="priority" id="priority" class="form-select">
                        <option value="">Select Priority</option>
                        <option value="high">High</option>
                        <option value="high">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div> --}}
        {{-- <div class="col-md-3">
                    <br />
                    <button type="submit" class="btn btn-primary">Search Here</button>
                </div> --}}
        {{-- <div class="col-md-3">
                    <br />
                    <button type="submit" class="btn btn-primary">Reset</button>
                </div> --}}
        {{-- </div>
        </form> --}}
        <hr>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Subcategory Order</th>
                        <th scope="col">Category Order</th>
                        <th scope="col">Subcategory</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @if ($sub_categories->isNotEmpty())
                    @foreach ($sub_categories as $subcategory)
                        <tbody>
                            <tr>
                                <th scope="row"> {{ $subcategory->id }}</th>
                                <th scope="row"> {{ $subcategory->category_id }}</th>
                                <td><a
                                        href="{{ route('edit_subcategory', ['id' => base64_encode($subcategory->id)]) }}">{{ $subcategory->name }}</a>
                                </td>
                                <td>{{ $subcategory->description }}</td>
                                <td>
                                    <ul>
                                        <a href="{{ route('edit_subcategory', ['id' => base64_encode($subcategory->id)]) }}"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('delete_subcategory', ['id' => base64_encode($subcategory->id)]) }}"
                                            title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-x-circle" viewBox="0 0 20 20">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
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
            {{ $sub_categories->links() }}
            {{-- {{ this is for pagination}} --}}
        </div>
    </div>

</body>

</html>

<script>
    // setTimeout(function() {

    //     document.getElementById('success-message').style.display = 'none';

    // }, 3000);
</script>
