<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Car;
use Validator;

class AuctionController extends Controller
{

    public function index()
    {
        $carAuctions = Auction::with('car')->get();
        return view('admin.car-auction.index', compact('carAuctions'));
    }

    public function create()
    {
        $cars = Car::where('status', 1)->get();
        return view('admin.car-auction.create', compact('cars'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,id',
            'minimum_bid' => 'required|numeric',
            'current_bid' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        if ($validator->fails()) {
         
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = [
            'car_id' => $request->car_id,
            'minimum_bid' => $request->minimum_bid,
            'current_bid' => $request->current_bid,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ];
        Auction::create($data);

        return redirect()->route('admin.carAuction.index')->with(['success' => 'Car auction created successfully.', 'status' => 'success']);
    }

    public function show(Auction $car_auction)
    {
        return view('admin.car-auction.view', compact('auction'));
    }

    public function edit(Auction $auction)
    {
        // dd($auction);
             $cars = Car::where('status', 1)->get();
        return view('admin.car-auction.edit', compact('auction', 'cars'));
    }

    public function update(Request $request, Auction $car_auction)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $car_auction->update($validated);

        return redirect()->route('admin.car-auction.index')->with('success', 'Car auction updated successfully.');
    }

    public function destroy(Auction $car_auction)
    {
        $car_auction->delete();

        return redirect()->route('admin.car_auctions.index')->with('success', 'Car auction deleted successfully.');
    }
}
