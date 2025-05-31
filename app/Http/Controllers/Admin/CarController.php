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
        $cars = Car::where('status' , 1)->get();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
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
            'status' => $request->status,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.cars.index')->with(['message', 'Car added successfully.' , 'status', 'success']);
    }

    public function show(Car $car)
    {
    
        return view('admin.cars.view', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->update($request->only(['name','make', 'model', 'year', 'description', 'image' , 'status']));

        return redirect()->route('admin.cars.index')->with(['message', 'Car updated successfully.' , 'status', 'success']);
    }

    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
     public function status(Request $request)
    {
        $user = Car::find($request->user_id);
        if ($user == null) {
            return response()->json(['status' => 'error', 'message' => 'data not found.']);
        }
        Car::where('id', $request->id)->update(['status' => $request->status]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status changed successfully.'
        ]);
    }
}
