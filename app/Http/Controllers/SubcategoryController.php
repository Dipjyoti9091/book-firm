<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller 
{
    public function add_subcategory(){
        $categories = Category::orderBy('id','ASC')->where('is_deleted','0')->get();
        // dd($categories);
        return view('subcategory.add_subcategory',[ 'categories' => $categories]);
    }

    public function store_subcategory(Request $request){
        // dd($request);
        $sub_category = new Subcategory;
        $sub_category->name = $request->subcategory;
        $sub_category->description = $request->subcategory_description;
        $sub_category->category_id = $request->category_id;
        // $sub_category->is_deleted = '0';
        $sub_category->save();
        return redirect()->route('list_subcategory')->with('success', 'Your subcategory created successfully!');
        // return redirect()->back()->with('success', 'Your category created successfully!');
    }

    public function list_subcategory(){
        $sub_categories = Subcategory::orderBy('id','ASC')->paginate(10);
        return view('subcategory.list_subcategory',['sub_categories' => $sub_categories]);
    }

    public function edit_subcategory($id){
        $categories = Category::orderBy('id','ASC')->where('is_deleted','0')->get();
        $sub_category_id   = base64_decode($id);
        $sub_category_data = Subcategory::find($sub_category_id);
        // dd($sub_category_data);
        return view('subcategory.edit_subcategory',['subcategory' => $sub_category_data, 'categories' => $categories]);
    }

    public function update(Request $request){
        $sub_category = Subcategory::find($request->id);

        if($sub_category){
            $sub_category->name = $request->subcategory;
            $sub_category->description = $request->subcategory_description;
            $sub_category->category_id = $request->category_id;
            $sub_category->save();
        }
        return redirect()->route('list_subcategory')->with('success', 'Your subcategory updated successfully!');
    }

    // public function delete_subcategory($id){
    //     $sub_category_id = base64_decode($id);

    //     Subcategory::
    // }
}
