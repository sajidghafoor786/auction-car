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
        $bids = Bid::with('user', 'auction.car')->latest()->get();
        $endedAuctions = Auction::where('end_date', '<', now())
                                ->with('bids')
                                ->get()
                                ->pluck('bids')
                                ->mapWithKeys(function ($bids) {
                                    $maxBid = $bids->max('bid_amount');
                                    return $bids->pluck('auction_id')->mapWithKeys(fn($id) => [$id => $maxBid]);
                                });

        return view('admin.bids.index', compact('bids', 'endedAuctions'));
    }

    public function create()
    {
        $users = User::all();
        $auctions = Auction::all();
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

        return redirect()->route('admin.bids.index')->with('success', 'Bid created successfully.');
    }

    public function edit(Bid $bid)
    {
        $users = User::all();
        $auctions = Auction::all();
        return view('admin.bids.edit', compact('bid', 'users', 'auctions'));
    }

    public function update(Request $request, Bid $bid)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'auction_id' => 'required|exists:auctions,id',
            'bid_amount' => 'required|numeric|min:1'
        ]);

        $bid->update($request->only('user_id', 'auction_id', 'bid_amount'));

        return redirect()->route('admin.bids.index')->with('success', 'Bid updated successfully.');
    }

    public function destroy(Bid $bid)
    {
        $bid->delete();
        return response()->json(['message' => 'Bid deleted successfully.']);
    }
}
