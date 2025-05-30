<?php

namespace App\Http\Controllers\admin;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = Brands::latest();
        if (!empty($request->get('keyword'))) {
            $brands = $brands->where('name', 'like', '%' . $request->get('keyword') . '%');
        }
        $brands = $brands->paginate(10);
        return view('admin.pages.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $brands = new Brands();
        $brands->name = $request->name;
        $brands->slug = $request->slug;
        $brands->status = $request->status == TRUE ? '1' : '0';
        // upload image in database 
        $image = $request->file('image');
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            // Add validation to ensure it is an image (you can add more formats if needed)
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $this->validate($request, [
                'file' => 'mimes:' . implode(',', $allowedMimeTypes)
            ]);

            $image->move('upload/brands_img', $imagename);
            $brands->image = $imagename;
        } else {
            $brands->image = 'No-image.jpg'; // Set a default image name
        }

        $brands->save();
        Session::flash('status', 'success');
        return back()->with('message', 'The brands added successfully ');
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
    public function edit($id)
    {
        $brands = Brands::find($id);
        return response()->json([
            'status' => 200,
            'brands' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->editId;
        $update_brands = Brands::find($id);
        $update_brands->name = $request->name;
        $update_brands->slug = $request->slug;
        $update_brands->status = $request->status;
        if ($request->file('image')) {
            $newImageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/brands_img'), $newImageName);
            $update_brands->image = $newImageName;
        }
        $update_brands->update();
        Session::flash('status', 'update');
        return back()->with('message', 'The brands Update successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brands = Brands::find($id);
        $path = 'upload/brands_img/' . $brands->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $brands->delete();
        Session::flash('status', 'delete');
        return redirect()->back()->with('message', 'brands delete Succesfully');
    }
    public function deleteimage($id)
    {
        $brand = Brands::findOrFail($id);
        $imageName = $brand->image;
        // Check if the file exists before attempting to delete
        if (File::exists("upload/brands_img/" . $imageName)) {
            File::delete("upload/brands_img/" . $imageName);
        }
        // Delete the image record from the database
        $brand->update(['image' => 'No-image.jpg']); // Assuming 'image' is the column name in your brands table
        // return response()->json(['message' => 'Image deleted successfully']);
    }
}
