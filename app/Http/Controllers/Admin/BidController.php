<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\User;

class BidController extends Controller
{
    public function index()
    {

        $bids = Bid::with(['user', 'auction.car'])->latest()->get();
        $endedAuctions = Bid::whereHas('auction', function ($query) {
            $query->where('end_date', '<', now());
        })
            ->select('auction_id', \DB::raw('MAX(bid_amount) as max_bid'))
            ->groupBy('auction_id')
            ->pluck('max_bid', 'auction_id')
            ->toArray();

        return view('admin.bids.index', compact('bids', 'endedAuctions'));
    }

    public function create()
    {
        $users = User::all();
        $auctions = Auction::where('status', 'active')->get();
        return view('admin.bids.create', compact('users', 'auctions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'auction_id' => 'required|exists:auctions,id',
            'bid_amount' => 'required|numeric|min:1'
        ]);

        Bid::create($request->only('user_id', 'auction_id', 'bid_amount'));

        return redirect()->route('admin.bid.index')->with('success', 'Bid created successfully.');
    }

    public function show($id)
    {
        $bid = Bid::with(['user', 'auction.car'])->findOrFail($id);
        //    dd($bid);

        return view('admin.bids.view', compact('bid'));
    }
}
