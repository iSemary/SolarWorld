<?php

namespace App\Http\Controllers;
use App\Category;
use App\Sub_Category;
use RealRashid\SweetAlert\Facades\Alert;
use \Validator;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Categories
    public function create_categories(){
        toast('Create Category','success');

        return view('admin.category')->with('categories',Category::class)->with('sub_category',Sub_Category::class);
    }
    public function store_categories(Request $request){

        $validator = Validator::make($request->all(), [
            'category_name'=>'required|unique:categories'
        ]);

        if ($validator->fails()) { // if error in validator
            return response()->json($validator->errors()->first());
        }

        Category::create([
            'category_name'=>$request->category_name
        ]);

        return response()->json('');
    }

    // Sub categories
    public function create_sub_categories(){
        toast('Create Sub Category','success');
        return view('admin.category')->with('categories',Category::class)->with('sub_categories',Sub_Category::class);
    }
    public function store_sub_categories(Request $request){

        $validator = Validator::make($request->all(), [
            'category_id'=>'required',
            'subcategory_name'=>'required'
        ]);

        if ($validator->fails()) { // if error in validator
            return response()->json($validator->errors()->first());
        }

        Sub_Category::create([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
        ]);

        return response()->json('');

    }

}
