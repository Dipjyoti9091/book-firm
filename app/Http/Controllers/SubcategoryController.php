<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;

class SubcategoryController extends Controller 
{
    public function add_subcategory(){
        return view('subcategory.add_subcategory');
    }
}
