<?php

namespace App\Http\Controllers\user;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sub_Category;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $categorySlug = null, $subcategorySlug = null)
    {

        $categorySelected = '';
        $subcategorySelected = '';
        $brandArray = [];
        $sortingOption = $request->input('sortName');
        // dd($sortingOption);
        $Brands = Brands::orderBy('id', 'DESC')->where('status', '0')->get();
        $Category = Category::orderBy('name', 'ASC')->with('sub_category')->where('status', '1')->get();
        $Product = Products::where('status', '1');
        //    Apply filter here 
        if (!empty($categorySlug)) {
            // dd($categorySlug);
            $CovertCategorySlug = str_replace('-', ' ', $categorySlug); //convert into stored format
            $FilterCategory = Category::where('slug', $CovertCategorySlug)->first();
            if ($FilterCategory) {
                $categorySelected = $FilterCategory->id;
                $Product = Products::where('category_id', $FilterCategory->id);
            }
        }
        // apply filter for sub_category 
        if (!empty($subcategorySlug)) {
            $CovertSubCategorySlug = str_replace('-', ' ', $subcategorySlug); //convert into stored format
            $FilterSubCategory = Sub_Category::where('slug', $CovertSubCategorySlug)->first();
            if ($FilterSubCategory) {
                $subcategorySelected = $FilterSubCategory->id;
                $Product = Products::where('sub_category_id', $FilterSubCategory->id);
            }
        }
        // apply filter for barnds
        if (!empty($request->get('brands'))) {
            $brandArray = explode(',', $request->get('brands'));
            $Product = Products::whereIn('brands_id', $brandArray);
        }
        // apply filter for sorting high and low and latest
        if (!empty($request->input('sortName'))) {
            if ($request->input('sortName') == 'Latest') {
                $Product = $Product->orderBy('id', 'DESC');
            } elseif ($request->input('sortName') == 'Price_Low') {
                $Product = $Product->orderBy('price', 'ASC');
            } elseif ($request->input('sortName') == 'Price_High') {
                $Product = $Product->orderBy('price', 'DESC');
            }
        }
        if(!empty($request->input('Search'))){
            $Product = $Product->where('title', 'like','%'.$request->input('Search').'%');
        }
        
        else {
            $Product = $Product->orderBy('id', 'DESC');
        }



        $Product = $Product->with('images');
        $Product = $Product->paginate(6);
        return view('user.pages.shop', compact('Brands', 'Category', 'Product', 'categorySelected', 'subcategorySelected', 'brandArray', 'sortingOption'));
    }

    
     
    public function SingleProductShow($slug)
    {
        $CovertProductSlug = str_replace('-', ' ', $slug); //convert into stored format
        $product = Products::where('slug', $CovertProductSlug)->with('images')->first();
        $productLatest = Products::orderBy('id', 'DESC')->with('images')->take(6)->get();
        if ($product == null) {
            abort(404);
        }
        return view('user.pages.product', compact('product', 'productLatest'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
