<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderBy('orders.id', 'DESC')->with('Users')->get();

        // dd($orders);
        return view('admin.pages.order.orderList', compact("order"));
    }
    public function OrderDetails($id)
    {
        $order = Order::select('orders.*', 'countries.name as CountryName')->leftJoin('countries', 'countries.id', 'Orders.country')
            ->where('orders.id', $id)->first();
        // dd($order);
        $orderItems = OrderItem::where('order_id', $id)->get();
        return view('admin.pages.order.orderDetails', compact("order", "orderItems"));
    }
    public function OrderStatusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shippe_date' => 'required|date|after_or_equal:now',
            // ... other validation rules ...
        ]);
        if ($validator->fails()) {
            // Validation failed
            return response()->json(['status' => 400, 'errors' => $validator->errors()]);
        }
        //   dd($request->orderStatus);
        $orderStatus = Order::find($request->id);
        $orderStatus->order_status = $request->orderStatus;
        $orderStatus->shipping_date = $request->shippe_date;
        $orderStatus->save();
        Session::flash('status', 'success');
        Session::flash('message', 'order status update successfully');
        return response()->json([
            'status' => 200
        ]);
    }

    public function InvoiceEmail(Request $request)
    {
        //    dd($request->userType);
        OrderEmailSend($request->id , $request->userType);
        // Session::flash('status', 'success');
        // Session::flash('message', 'Mail send successfully!');
        return response([
            'status' => 200,
            'message'=>'Mail send successfully!'
            
        ]);
    }
}
