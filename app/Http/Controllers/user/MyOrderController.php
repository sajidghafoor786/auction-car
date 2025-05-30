<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class MyOrderController extends Controller
{
    public function MyOrder()
    {
        $myorder = Order::orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
        return view('user.order.myorder', compact('myorder'));
    }
    public function MyOrderDetails($id)
    {
        $myorder = Order::where('id',$id)->get();
        $order_detail = OrderItem::where('order_id',$id)->get();
        $count = $order_detail->count();
        // dd($order_detail);
        return view('user.order.oderdetails', compact('order_detail', 'myorder', 'count'));
    }
}
