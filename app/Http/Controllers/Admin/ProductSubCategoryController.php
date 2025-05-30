<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    public function index(Request $request){
        if(!empty($request->category_id)){

            $subcategory = Sub_Category::where('category_id',$request->category_id)
            ->orderBy('name', 'ASC')->get();
            return response()->json([
                'status' => 200,
                'subcategory' => $subcategory,
            ]);
        }
        // dd($request->category_id);
    }
}
