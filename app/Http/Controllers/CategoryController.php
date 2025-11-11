<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function add_category()
    {
        return view('category.add_category');
    }

    public function store_category(Request $request){
        // dd($request);

        $category = new Category;
        $category->name = $request->category;
        $category->description = $request->category_description;
        $category->is_deleted = '0';
        $category->save();
        return redirect()->route('list_category')->with('success', 'Your category created successfully!');
        // return redirect()->back()->with('success', 'Your category created successfully!');
    }

    public function list_category(){
        $categories = Category::orderBy('id','ASC')->where('is_deleted','0')->paginate(10);

        return view('category.list_category',['categories' => $categories]);
    }

    public function edit_category($id){
        $category_id = base64_decode($id);
        $category_data = Category::find($category_id);

        return view('category.edit_category',['category' => $category_data]);
    }

    public function update_category(Request $request){
        $category = Category::find($request->id);

        if($category){
            $category->name = $request->category;
            $category->description = $request->category_description;
            $category->save();
        }
        return redirect()->route('list_category')->with('success','Category Updated Successfully');
    }

    public function delete_category($id){
        $category_id = base64_decode($id);
        Category::where('id', $category_id)->update(['is_deleted' => '1']);

        flash()->success('Category Deleted 😢');
        return redirect()->route('list_category');
    }
}
