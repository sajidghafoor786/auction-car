<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Bid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{

   public function frontHome(Request $request)
{
    $query = Auction::with('car')->where('status', 'active');

    if ($request->has('Search') && $request->Search != '') {
        $search = $request->Search;
        $query->whereHas('car', function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        });
    }

    $activeAuctions = $query->orderBy('start_date', 'desc')->get();

    return view("frontend.index", compact('activeAuctions'));
}

    public function auctionDetail(Auction $auction)
    {
        $auction->load('car');
        // dd($auction);
        $bids = Bid::where('auction_id', $auction->id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.auction-detail', compact('auction', 'bids'));
    }


    public function auctionAddBid(Request $request)
    {
        $request->validate([
            'auction_id' => 'required|exists:auctions,id',
            'bid_amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $auction = Auction::find($request->auction_id);

        if (!$auction) {
            return Response::json(['status' => 'error', 'message' => 'Auction not found.'], 404);
        }

        // Check for existing bids
        $latestBid = Bid::where('auction_id', $auction->id)->orderBy('id', 'desc')->first();

        // Initial bid check
        if (!$latestBid) {
            if ($request->bid_amount < $auction->minimum_bid) {
                return Response::json(['status' => 'error', 'message' => 'Your bid must be at least the minimum bid.'], 422);
            }
        } else {
            // Bid must be higher than current
            if ($request->bid_amount <= $latestBid->bid_amount) {
                return Response::json(['status' => 'error', 'message' => 'Please enter an amount higher than the current maximum bid.'], 422);
            }

            // Prevent same user from bidding again until outbid
            if ($latestBid->user_id == $user->id) {
                return Response::json(['status' => 'error', 'message' => 'You already have the highest bid. Wait until someone outbids you.'], 422);
            }
        }

        // Save new bid
        Bid::create([
            'auction_id' => $auction->id,
            'user_id' => $user->id,
            'bid_amount' => $request->bid_amount,
        ]);

        // Update auction current bid
        $auction->current_bid = $request->bid_amount;
        $auction->update();

        return Response::json(['status' => 'success', 'message' => 'Your bid has been placed successfully.']);
    }
    public function myBidHistory(Request $request)
    {
        $user = auth()->user();

        // Get user's bids with related auction and car
        $bids = Bid::with(['auction.car'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get all ended auctions and their highest bids
        $endedAuctions = Bid::select('auction_id', DB::raw('MAX(bid_amount) as max_bid'))
            ->whereHas('auction', function ($query) {
                $query->where('end_date', '<', Carbon::now());
            })
            ->groupBy('auction_id')
            ->get()
            ->pluck('max_bid', 'auction_id');

        return view('frontend.auction-history', compact('bids', 'endedAuctions'));
    }
}
