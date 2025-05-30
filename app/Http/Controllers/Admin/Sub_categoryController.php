<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class Sub_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sub_category = Sub_Category::select('sub_categories.*','categories.name as categoryName')
        ->latest('sub_categories.id')
        ->leftjoin('categories', 'categories.id', 'sub_categories.category_id');
        if (!empty($request->get('keyword'))) {
            $sub_category = $sub_category->where('sub_categories.name', 'like', '%' . $request->get('keyword') . '%');
            $sub_category = $sub_category->orWhere('categories.name', 'like', '%' . $request->get('keyword') . '%');
        }
        $sub_category = $sub_category->paginate(10);
        $category= Category::orderBy('name','ASC')->get();
        return view('admin.pages.sub_category', compact('category','sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sub_category = new Sub_Category();
        $sub_category->name = $request->name;
        $sub_category->slug = $request->slug;
        $sub_category->category_id = $request->category_name;
        $sub_category->status = $request->status == TRUE ? '1' : '0';
        // upload image in database 
        $image = $request->file('image');
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            // Add validation to ensure it is an image (you can add more formats if needed)
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $this->validate($request, [
                'file' => 'mimes:' . implode(',', $allowedMimeTypes)
            ]);

            $image->move('upload/sub_category_img', $imagename);
            $sub_category->image = $imagename;
        } else {
            $sub_category->image = 'No-image.jpg'; // Set a default image name
        }

        $sub_category->save();
        Session::flash('status', 'success');
        return back()->with('message', 'The sub_category added successfully ');
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
        $sub_category = Sub_Category::find($id);
        return response()->json([
            'status' => 200,
            'sub_category' => $sub_category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->editId;
        $update_sub_category = Sub_Category::find($id);
        $update_sub_category->name = $request->name;
        $update_sub_category->slug = $request->slug;
        $update_sub_category->status = $request->status;
        if ($request->hasFile('image')) {
            $newImageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/sub_category_img'), $newImageName);
            $update_sub_category->image = $newImageName;
        }
        $update_sub_category->update();
        Session::flash('status', 'update');
        return back()->with('message', 'The sub_category Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sub_category = Sub_Category::find($id);
        $path = 'upload/sub_category_img/' . $sub_category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $sub_category->delete();
        Session::flash('status', 'delete');
        return redirect()->back()->with('message', 'sub_Category delete Succesfully');
    }
    public function deleteimage($id)
    {
        $sub_category = Sub_Category::findOrFail($id);
        $imageName = $sub_category->image;
        // Check if the file exists before attempting to delete
        if (File::exists("upload/sub_category_img/" . $imageName)) {
            File::delete("upload/sub_category_img/" . $imageName);
        }
        // Delete the image record from the database
        $sub_category->update(['image' => 'No-image.jpg']); // Assuming 'image' is the column name in your brands table
        // return response()->json(['message' => 'Image deleted successfully']);
    }
}
