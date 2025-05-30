<?php

namespace App\Http\Controllers\user;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowCart()
    {

        $cartItems = Cart::content();
        return view('user.pages.cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adddsdfToCart(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            $message = 'You are not authenticated please login first.';
            Session::flash('status', 'error');
            Session::flash('message', $message);
            return response()->json(['message' => $message]);  // 401 indicates unauthorized
        }

        $product = Products::with('images')->find($request->id);

        $existingCartItem = Carts::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            return response()->json(['message' => 'Product is already in the cart.']); // 422 indicates unprocessable entity
        }

        $cart = new Carts;
        $cart->product_id = $request->id;
        $cart->qty = '1';
        $cart->user_id = $user->id;

        $cart->save();

        return response()->json(['message' => 'Product is added in the cart Successfully.']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $newQty = $request->newQty;
        $itemInfo = Cart::get($rowId);
        $product = Products::find($itemInfo->id);
        if($newQty <= $product->qty  ){
            Cart::update($rowId, $newQty);
            $message = 'Cart updated successfully';
            Session::flash('status', 'success');
            Session::flash('message', $message);
            return response()->json([
                'status' => true,
                'message' => "Cart updated successfully",
            ]);
        }
        else{
            $message = 'Requested Quantity not available in Stock.';
            Session::flash('status', 'error');
            Session::flash('message', $message);
            return response()->json([
                'status' => false,
                'message' => "Stock not available",
            ]);

        }
        

        // Retrieve the cart item by product ID, get the rowId
        // $cartItem = Cart::search(function ($cartItem, $rowId) use ($productId) {
        //     return $cartItem->id === $productId;
        // })->first();

        // if ($cartItem) {
        //     // Update the cart item using the rowId


        // }
        // if ($quantity <= $product->qty) {

        //     // Perform the necessary updates in your database
        //     $subtotal = 0;
        //     // For demonstration purposes, calculate a new subtotal
        //     $total = $product->price * $quantity;
        //     $subtotal += $total;

        //     // Return the updated subtotal
        //     return response()->json([
        //         'quantity' => $request->quantity,
        //         'total' => $total,
        //         'subtotal' => $subtotal,
        //         'stockAvailable' => true,
        //     ]);
        // } else {
        //     // Indicate that stock is not available
        //     return response()->json([
        //         'message' => 'Stock not available',
        //         'stockAvailable' => false,
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function addToCart(Request $request)
    {
        $productId = $request->id;
        $product = Products::with('images')->find($request->id);
        // Check if the user is authenticated
        if (!Auth::check()) {
            $message = 'You are not authenticated please login first.';
            Session::flash('status', 'error');
            Session::flash('message', $message);
            return response()->json(['message' => $message]);
        }

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found']);
        }
        // Check if the product ID already exists in the cart
        $cartContent = Cart::content();
        $AlreadyExistingProduct = false;
        foreach ($cartContent as  $item) {
            if ($item->id == $productId) {
                $AlreadyExistingProduct = true;
            }
        }
        if ($AlreadyExistingProduct == false) {
            Cart::add($product->id, $product->title, 1, $product->price, ['productImage' => (!empty($product->images)) ? $product->images->first() : '']);
            return response()->json(['message' => 'Product is added in the cart Successfully.']);
            Session::flash('status', 'error');
            Session::flash('success', 'Product added to the cart successfully.');
        } else {
            return response()->json(['message' => 'Product is already in the cart.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function DeleteCart(Request $request)
    {
        Cart::remove($request->rowId);
        Session::flash('status', 'delete');
        Session::flash('message', 'item delete in cart successfully');
        return response()->json(['status' => true]);
    }
   
}
