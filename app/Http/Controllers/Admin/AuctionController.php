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
            'current_bid' => 'nullable|numeric',
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

        return redirect()->route('admin.carAuction.index')->with(['message' => 'Car auction created successfully.', 'status' => 'success']);
    }

    public function show(Auction $auction)
    {
        $auction->load('car');
        return view('admin.car-auction.view', compact('auction'));
    }

    public function edit(Auction $auction)
    {
        // dd($auction);
        $cars = Car::where('status', 1)->get();
        return view('admin.car-auction.edit', compact('auction', 'cars'));
    }

    public function update(Request $request, Auction $auction)
    {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,id',
            'minimum_bid' => 'required|numeric',
            'current_bid' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $data = [
            'car_id' => $request->car_id,
            'minimum_bid' => $request->minimum_bid,
            'current_bid' => $request->current_bid,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ];
        $auction->update($data);

        return redirect()->route('admin.carAuction.index')->with(['message' => 'Car auction updated successfully.', 'status' => 'success']);
    }

    public function destroy(Auction $auction)
    {
        if ($auction == null) {
            return response()->json(['status' => 'error', 'message' => 'data not found.']);
        }
        $auction->delete();
        return response()->json(['status' => 'success', 'message' => 'Car auction deleted successfully']);
    }
        public function status(Request $request)
    {
        $auction = Auction::find($request->auction_id);
        if ($auction == null) {
            return response()->json(['status' => 'error', 'message' => 'data not found.']);
        }
        Auction::where('id', $request->auction_id)->update(['status' => $request->status]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status changed successfully.'
        ]);
    }
}
