<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Models\Category as ModelsCategory;

class CategoryController extends Controller
{
 
    public function index( Request $request)
    {
        $categoryOne = Category::latest();
        if(!empty($request->get('keyword'))){
             $categoryOne = $categoryOne->where('name','like','%'. $request->get('keyword').'%');
        }
        $categoryOne = $categoryOne->paginate(10);
        return view("admin.pages.category", compact('categoryOne'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $category = new Category;
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'status' => 'required',
           
        // ]);
        $image = $request->file('image');
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            // Add validation to ensure it is an image (you can add more formats if needed)
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $this->validate($request, [
                'file' => 'mimes:' . implode(',', $allowedMimeTypes)
            ]);

            $image->move('upload/category_img', $imagename);
            $category->image = $imagename;
        } else {
            $category->image = 'No-image.jpg'; // Set a default image name
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status == TRUE ? '1' : '0';
        $category->save();
        Session::flash('status', 'success');
        return back()->with('message','The category added successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return response()->json([
            'status' => 200,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id= $request->editId;
       $update_category= Category::find($id);
       $update_category->name = $request->name;
       $update_category->slug = $request->slug;
       $update_category->status = $request->status;
        if ($request->hasFile('image')) {
            $newImageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/category_img'), $newImageName);
            $update_category->image = $newImageName;
        }
        $update_category->update();
        Session::flash('status', 'update');
        return back()->with('message', 'The category Update successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $category = Category::find($id);
        $path = 'upload/category_img/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        Session::flash('status', 'delete');
        return redirect()->back()->with('message', 'Category delete Succesfully');
    }
    public function deleteimage($id)
    {
        $category = Category::findOrFail($id);
        $imageName = $category->image;
        // Check if the file exists before attempting to delete
        if (File::exists("upload/category_img/" . $imageName)) {
            File::delete("upload/category_img/" . $imageName);
        }
        // Delete the image record from the database
        $category->update(['image' => 'No-image.jpg']); // Assuming 'image' is the column name in your brands table
        // return response()->json(['message' => 'Image deleted successfully']);
    }
}
