<?php

namespace App\Http\Controllers\user;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $userId = Auth()->user();
        $wishlist = Wishlist::where('user_id', $userId->id)->get();
        // dd($wishlist);
        return view('user.pages.wishlist',compact('wishlist'));
    }
    public function WishListAdded(Request $request)
    {
        $userId = Auth()->user();
        if (!Auth()->check()) {
            $message = 'Not authenticated';
            return response()->json(['message' => $message]);
        }

        $AlreadyWishlist = Wishlist::where('user_id', $userId->id)->where('product_id', $request->id)->first();
        if ($AlreadyWishlist) {
            return response()->json([
                'message' => 'Product already in wishlist',
            ]);
        }
        // dd($request->id);
        $wishList = new Wishlist();
        $wishList->user_id = $userId->id;
        $wishList->product_id = $request->id;
        $wishList->save();
        return response()->json([
            ' status' => 200,
            ' message' => 'Product added in wishlist successfully',
        ]);


        // return view('user.pages.wishlist');
    }
    public function WishListDeleted(Request $request)
    {
        
        $wishlist = Wishlist::find($request->Id);
        // dd($wishlist);
          $wishlist->delete();
          
        return response()->json([
            'status' => true,
            'message' => 'Product deleted in wishlist successfully',
        ]);
    }
}
