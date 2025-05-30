<?php

use App\Mail\OrderEmail;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductImage;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// get category  by navbar  
function getCategort()
{
    return Category::orderBy('id', 'ASC')->with('sub_category')->where('status', '1')->take(4)->get();
}
// get category for show category in home page
function getCategortAll()
{
    return Category::orderBy('name', 'ASC')->with('sub_category')->where('status', '1')->get();
}
// get product 
function getProduct()
{
    // dd('Helper function called');
    return Products::orderBy('title', 'DESC')->with('images')->where('is_featured', 'yes')->where('status', '1')->get();
}
function getProductLatest()
{

    return Products::orderBy('id', 'DESC')->with('images')->where('status', '1')->take(8)->get();
}
// get brand 
function getBrands()
{
    return Brands::orderBy('id', 'DESC')->where('status', '0')->get();
}
function getProductImage($productId)
{
    return ProductImage::where('product_id', $productId)->first();
}
function ProductDetails($product_Id)
{
    return Products::find($product_Id);
}
function OrderEmailSend($OrderId , $userType)
{
     $userType;
    $adminEmail = Auth()->user();
    // dd($adminEmail);
    $order = Order::where('id', $OrderId)->with('items')->first();
    // get user actual email 
    $userEmail = User::where('id', $order->user_id)->first();
    $itemCount = $order->items->count(); // Use the relationship to get items
    // check coutomer ad admin 
     if($userType == 'Customer'){
        $subject = 'Thanks for the new order';
        $email =$userEmail->email;
    }else{
        $subject = 'You Have recived new order';
        $email =$adminEmail->email;
     }
    $emailData = [
        'subject' =>$subject,
        'order' => $order,
        'userType' => $userType,
        'itemCount' => $itemCount, // Use itemCount instead of orderitem
    ];

    Mail::to($email)->send(new OrderEmail($emailData));
    // dd($order);
}
function getCountry($id)
{
    return Country::where('id', $id)->first();
}
