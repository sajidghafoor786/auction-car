<?php

namespace App\Http\Controllers\admin;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Products::latest('id')->with('images');

        $category = Category::orderBy('name', 'ASC')->get();
        $brand = Brands::orderBy('name', 'ASC')->get();
        if (!empty($request->get('keyword'))) {
            $product = $product->where('title', 'like', '%' . $request->get('keyword') . '%');
            //     $product = $product->orWhere('category.name', 'like', '%' . $request->get('keyword') . '%');
            //     $product = $product->orWhere('brand.name', 'like', '%' . $request->get('keyword') . '%');
            //
        }
        $product = $product->paginate();
        // dd($product);
        return view('admin.pages.product', compact('category', 'brand', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Your validation rules here
            'category' => 'required|exists:categories,id',
            'sub_category' => 'required|exists:sub_categories,id', // Example of checking existence in sub_categories table
            'brand' => 'required|exists:brands,id', // Example of checking existence in brands table
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $product = new Products();
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->short_desc = $request->short_description;
            $product->shipping_returns = $request->shipping_returns;
            $product->price = $request->price;
            $product->compare_price = $request->com_price;
            $product->sku = $request->sku;
            $product->barcode = $request->b_code;
            $product->qty = $request->qty;
            $product->sub_category_id = $request->sub_category;
            $product->category_id = $request->category;
            $product->brands_id = $request->brand;
            $product->status = $request->p_status == TRUE ? '1' : '0';
            // upload images in the database
            if ($request->hasFile('images') && $request->file('images') !== null) {
                if (count($request->file('images')) > 5) {
                    Session::flash('status', 'error');
                    return back()->with("message", 'You can only upload up to five images.');
                }
                // else part 
                else {
                    if ($request->hasFile('images')) {
                        // Save the product first to get the product ID
                        $product->save();
                        $imagePaths = [];
                        foreach ($request->file('images') as $image) {
                            $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                            $image->move(public_path('upload/products_img'), $imageName);
                            $imagePaths[] = $imageName;
                            // Create a new ProductImage instance and associate it with the product
                            ProductImage::create([
                                'product_id' => $product->id,
                                'image' => $imageName,
                            ]);
                        }
                        Session::flash('status', 'success');
                        return back()->with("message", 'The Product Added successfully');
                    }
                }
            } else {
                Session::flash('status', 'warning');
                return back()->with("message", 'Please Upload Al List One Image');
            }
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Products::with('images')->find($id);
        $brands = Brands::orderBy('name', 'ASC')->get();
        $categorys = Category::orderBy('name', 'ASC')->get();
        $brand = Brands::find($product->brands_id); // Assuming 'brands_id' is the foreign key in the 'Products' table
        $category = Category::find($product->category_id);
        return response()->json([
            'status' => 200,
            'product' => $product,
            'brands' => $brands,
            'categorys' => $categorys,
            'selectedBrand' => $brand, // Include the selected brand
            'selectedCategory' => $category, // Include the selected brand
            'category' => $category,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Your validation rules here
            'category' => 'required|exists:categories,id',
            'sub_category' => 'required|exists:sub_categories,id', // Example of checking existence in sub_categories table
            'brand' => 'required|exists:brands,id', // Example of checking existence in brands table
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         else {
            $id = $request->id;
            $product = Products::find($id);
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->short_desc = $request->short_description;
            $product->shipping_returns = $request->shipping_returns;
            $product->price = $request->price;
            $product->compare_price = $request->com_price;
            $product->sku = $request->sku;
            $product->barcode = $request->b_code;
            $product->qty = $request->qty;
            $product->sub_category_id = $request->sub_category;
            $product->category_id = $request->category;
            $product->brands_id = $request->brand;
            $product->status = $request->p_status == TRUE ? '1' : '0';
            if ($request->hasFile('images')) {
                if (!empty($request->file('images'))) {
                    // Delete associated image files from the server
                    $images = ProductImage::where("product_id", $id)->get();

                    if (count($request->file('images')) < 5) {

                        if ($request->hasFile('images')) {
                            $imagePaths = [];
                            foreach ($request->file('images') as $image) {
                                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                                $image->move(public_path('upload/products_img'), $imageName);
                                $imagePaths[] = $imageName;
                                // Create a new ProductImage instance and associate it with the product
                                ProductImage::create([
                                    'product_id' => $id,
                                    'image' => $imageName,
                                ]);
                            }
                            // The rest of your code...
                            $product->update();
                            Session::flash('status', 'update');
                            return redirect()->back()->with('message', 'Product updated successfully');
                        }
                    } 
                    else {
                        Session::flash('status', 'error');
                        return redirect()->back()->with('message', 'You Can Upload lessthen 5 Image ');
                    }
                }
            }
            // The rest of your code...
            $product->update();
            Session::flash('status', 'update');
            return redirect()->back()->with('message', 'Product updated successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        if ($product) {
            $images = ProductImage::where("product_id", $product->id)->get();
            foreach ($images as $image) {
                if (File::exists("upload/products_img/" . $image->image)) {
                    File::delete("upload/products_img/" . $image->image);
                    $image->delete();  // Delete image record from the database
                }
            }
        }
        $product->delete();
        Session::flash('status', 'delete');
        return redirect()->back()->with('message', 'product delete Succesfully');
    }

    public function deleteimage($id)
    {
        $images = ProductImage::findOrFail($id);
        if (File::exists("upload/products_img/" . $images->image)) {
            File::delete("upload/products_img/" . $images->image);
        }

        ProductImage::find($id)->delete();
        // Session::flash('status', 'delete');
        // return redirect()->back()->with('message', 'Image delete Succesfully');
    }
}
