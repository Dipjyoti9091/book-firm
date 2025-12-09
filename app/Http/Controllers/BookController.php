<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function add_page()
    {
        $categories = Category::orderBy('id', 'ASC')->where('is_deleted','0')->get();
        return view('books.add_page', ['categories' => $categories]);
    }

    public function getSubcategories(Request $request){
        $subcategories = Subcategory::where('category_id', $request->category_id)->pluck('name','id');

        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_page(Request $request)
    {
        // dd($request);
        $request->validate([
            'fileToUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $book_data = new Book;
        $book_data->title = $request->title;
        $book_data->author = $request->author;
        $book_data->category_id = $request->category_id;
        $book_data->subcategory_id = $request->subcategory_id;
        $book_data->price = $request->price;
        $book_data->stock = $request->initial_stock;
        $book_data->description = $request->book_description;

        if($request->hasFile('fileToUpload')){
            $uploadedFile = $request->file('fileToUpload');
            // 1. Correct Path Argument: Use 'book_covers' as the folder name.
            // 2. Specify the 'public' disk as the second argument.
            $path = $uploadedFile->store('book_covers', 'public');
            // The path returned (e.g., 'book_covers/unique_filename.jpg') 
            // is what you save to the database.
            $book_data->cover_image = $path;
            // Save the $book_data object here if you removed the previous save.
            // $book_data->save();
        }
        $book_data->save();

        return redirect()->route('list_page')->with('success', 'Your book data created successfully!');
    }

    /**
     * Display a listing of the resource.
     */
    public function list_page()
    {
        $book_lists = Book::with(['Category','Subcategory'])->orderBy('id', 'ASC')->paginate(5);
        // $book_lists = Book::with(['Category'])->orderBy('id', 'ASC')->get();
        // dd($book_lists);
        return view('books.list_page',['book_lists' => $book_lists]);
    }

    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_page(string $id)
    {
        // dd($id);
        $book_id = base64_decode($id);
        $book_data = Book::find($book_id);
        $categories = Category::orderBy('id', 'ASC')->where('is_deleted','0')->get();
        return view('books.edit_page', ['book_data' => $book_data, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_page(Request $request)
    {
        // dd($request);
        $request->validate([
            'fileToUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $book_data = Book::find($request->id);
        if($book_data){
        $book_data->title = $request->title;
        $book_data->author = $request->author;
        $book_data->category_id = $request->category_id;
        $book_data->subcategory_id = $request->subcategory_id;
        $book_data->price = $request->price;
        $book_data->stock = $request->initial_stock;
        $book_data->description = $request->book_description;
        
        if ($request->hasFile('fileToUpload')) {
            if ($book_data->cover_image) {
                Storage::disk('public')->delete($book_data->cover_image);
            }
            $uploadedFile = $request->file('fileToUpload');
            $path = $uploadedFile->store('book_covers', 'public');
            $book_data->cover_image = $path;
        }

        $book_data->save();
        }
        return redirect()->route('list_page')->with('success','Book data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
