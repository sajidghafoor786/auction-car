<?php
namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::get();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cars',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $imagePath = $request->file('image')->store('cars', 'public');

        Car::create([
            'name' => $request->name,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'status' => $request->is_active,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.cars.index')->with(['message'=> 'Car added successfully.' , 'status'=> 'success']);
    }

    public function show(Car $car)
    {
    
        return view('admin.cars.view', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

   public function update(Request $request)
{
    $car = Car::findOrFail($request->id);
    $request->validate([
        'name' => 'required|unique:cars,name,' . $car->id,
        'make' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'make' => $request->make,
        'model' => $request->model,
        'year' => $request->year,
        'description' => $request->description,
        'status' => $request->is_active ?? 0,
    ];

    if ($request->hasFile('image')) {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }
        $data['image'] = $request->file('image')->store('cars', 'public');
    }
    $car->update($data);

    return redirect()->route('admin.cars.index')->with([
        'message' => 'Car updated successfully.',
        'status' => 'success'
    ]);
}


    public function destroy(Car $car)
    {
         if ($car == null) {
            return response()->json(['status' => 'error', 'message' => 'data not found.']);
        }
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();
        return response()->json([ 'status'=> 'success' ,'message'=> 'Car deleted successfully']);
    }
     public function status(Request $request)
    {
        $user = Car::find($request->car_id);
        if ($user == null) {
            return response()->json(['status' => 'error', 'message' => 'data not found.']);
        }
        Car::where('id', $request->car_id)->update(['status' => $request->status]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status changed successfully.'
        ]);
    }
}
