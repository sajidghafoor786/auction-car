<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Http\Controllers\Controller;
use App\Models\CoupenCode;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\ShippingCharge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Else_;

class CheckOutController extends Controller
{
    public function CheckOut()
    {


        if (Cart::count() == 0) {
            Session::flash('status', 'error');
            Session::flash('message', 'your cart should not be empty!.');
            return redirect()->back();
        } else {
            $country = Country::orderBy('name', 'ASC')->get();
            return view('user.pages.checkout', compact('country'));
        }
    }
    public function  ProcessCheckout(Request $request)
    {
        // get user details by auth 
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'country_id' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zip' => ['required'],
            'mobile' => ['required', 'max:11'],

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            // return response()->json(['error' => $validator->error()]);
        } else {
            $custemer_address = CustomerAddress::updateOrCreate(
                // UPDATECRATE method get two parameter first check data and secend update data 
                ['user_id' => $user->id],
                [
                    'user_id' => $user->id,
                    'f_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'country' => $request->country_id,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                    'phone_no' => $request->mobile,
                ],
            );
            // $order = null;
            // insert data in ordder table  
            if ($request->payment_method == 'COD' && Cart::count() > 0) {
                $coupen_code = 'null';
                $coupenCodeId = 'null';
                if (Session()->has('CoupenOk')) {
                    $code = Session()->get('CoupenOk');
                    $coupen_code = $code->code;
                    $coupenCodeId = $code->id;
                }
                $order =  new Order();
                $shipping = 0;
                $discount = 0;
                $subtotal = Cart::subtotal(2, '.', '');
                // $grandTotal = $subtotal + $shipping;
                $order->user_id = $user->id;
                $order->subtotal = $subtotal;
                $order->shipping =  str_replace(',', '', $request->shipping);
                $order->discount = $request->discount;
                $order->coupen_code = $coupen_code;
                $order->coupen_code_id = $coupenCodeId;
                $order->grand_total = str_replace(',', '', $request->grandTotal);
                $order->f_name = $request->first_name;
                $order->last_name = $request->last_name;
                $order->email = $request->email;
                $order->country = $request->country_id;
                $order->address = $request->address;
                $order->state = $request->state;
                $order->city = $request->city;
                $order->phone_no = $request->mobile;
                $order->save();


                //   order_item data insert in data base 
                foreach (Cart::content() as $item) {

                    $order_item = new OrderItem();
                    $order_item->order_id = $order->id;
                    $order_item->product_id = $item->id;
                    $order_item->name = $item->name;
                    $order_item->qty = $item->qty;
                    $order_item->price = $item->price;
                    $order_item->total = $item->price * $item->qty;
                    $order_item->save();


                    // product qty update 
                    $productDate = Products::find($item->id);
                    $currentQty = $productDate->qty;
                    $updateQty = $currentQty - $item->qty;
                     $productDate->qty = $updateQty;
                    $productDate->save();
                }
                OrderEmailSend($order->id, 'Customer');
                Cart::destroy();
                Session()->forget('CoupenOk');
                return redirect()->route('user.Thankyou', ['order' => $order]);
            } else {
                return redirect()->route("user.cart");
            }

            // $user = Auth::user();
            // $order = Order::orderBy('id', 'DESC')->find($user->id)->first();

        }
    }
    public function OrderSummeryShipping(Request $request)
    {
        $subtotal = Cart::subtotal(2, '.', '');
        $discount = number_format(0, 2);
        $message = '';
        $status = true;
        // apply discount here 
        if (Session()->has('CoupenCode')) {
            $code = Session()->get('CoupenCode');
            $message = "disount coupen apply atlest(" . $code->min_amount . "/PKR)amount";
            $status = false;
            // check subtotall graterthen min_amount 
            if ($subtotal > $code->min_amount) {
                $status = true;
                $message = 'Discount Coupen Apply Successfully';
                // send data in database on session 
                Session()->put('CoupenOk', $code);
                if ($code->type == "PERCENT") {
                    $discount = $subtotal * $code->discount_amount / 100;
                } else {
                    $discount = $code->discount_amount;
                }
            }
            Session()->forget('CoupenCode');
        }
        $countryId = $request->CountryId;
        if ($countryId > 0) {
            $shippingInfo = ShippingCharge::where('country_id',  $countryId)->first();
            if ($shippingInfo != null) {
                $subtotal = $subtotal;
                $totalQty = 0;
                foreach (Cart::content() as  $item) {
                    $totalQty = $totalQty + $item->qty;
                }
                $totalShippingCharges = $totalQty * $shippingInfo->amount;
                $grandTotal =   $totalShippingCharges +  ($subtotal - $discount);
                // $message = "Discount Coupen Apply Successfully";
                return response([
                    'status' => $status,
                    'message' => $message,
                    'discount' => $discount,
                    'shippingCharge' => number_format($totalShippingCharges, 2),
                    'grandTotal' => number_format($grandTotal, 2)
                ]);
            } else {
                $shippingInfo = ShippingCharge::where('country_id', '5')->first();
                if ($shippingInfo != null) {
                    $subtotal = Cart::subtotal(2, '.', '');
                    $totalQty = 0;
                    foreach (Cart::content() as  $item) {
                        $totalQty = $totalQty + $item->qty;
                    }
                    $totalShippingCharges = $totalQty * $shippingInfo->amount;
                    $grandTotal =   $totalShippingCharges +  ($subtotal - $discount);
                    // $message = "Discount Coupen Apply Successfully";
                    return response([
                        'status' => $status,
                        'message' => $message,
                        'discount' => $discount,
                        'shippingCharge' => number_format($totalShippingCharges, 2),
                        'grandTotal' => number_format($grandTotal, 2)

                    ]);
                }
            }
        } else {
            $subtotal = $subtotal;
            return response([
                'status' => $status,
                'message' => $message,
                'discount' => $discount,
                'shippingCharge' => number_format(0, 2),
                'grandTotal' => number_format(($subtotal - $discount), 2)

            ]);
        }


        // shipping code 
        // $customer_address = CustomerAddress::where('user_id', Auth::user()->id)->first();
        // dd($customer_address);
        // $userCountry = $customer_address->country;
        // echo $shippingInfo->amount;


    }
    public function Thankyou(Order $order)
    {
        Session::flash('success', 'You have successfully placed your order');
        return view('user.pages.thanks', compact('order'));
    }
    // apply discount 
    public function DiscountApply(Request $request)
    {
        // dd($now);
        $code = CoupenCode::where('code', $request->code)->first();
        if ($code == null) {
            return response([
                'status' => false,
                'message' => 'invalid coupen code'

            ]);
        }
        $now = Carbon::now();
        if ($code->start_at != '') {
            $startDate = carbon::createFromFormat('Y-m-d H:i:s', $code->start_at);
            $showDate = $startDate->format('D-m-y h:i A');
            if ($now->lt($startDate)) {
                return response([
                    'status' => false,
                    'message' => 'coupon code start from ' . $showDate,
                ]);
            }
        }
        if ($code->end_at != '') {
            $endDate = carbon::createFromFormat('Y-m-d H:i:s', $code->end_at);
            $showDate = $startDate->format('D-m-y h:i A');
            if ($now->gt($endDate)) {
                return response([
                    'status' => false,
                    'message' => 'coupen code expired at ' .  $showDate,

                ]);
            }
        }
        $coupenUseTime = Order::where('coupen_code', $code->code)->count();
        if ($coupenUseTime >= $code->max_uses) {
            return response([
                'status' => false,
                'message' => "coupen code not available",

            ]);
        }
        $coupenUserUserTime = Order::where(['coupen_code' => $code->code, 'user_id' => Auth::user()->id])->count();
        if ($coupenUserUserTime >= $code->max_uses_user) {
            return response([
                'status' => false,
                'message' => "you already use this coupen ",

            ]);
        }

        Session()->put('CoupenCode', $code);
        return $this->OrderSummeryShipping($request);
    }
}
