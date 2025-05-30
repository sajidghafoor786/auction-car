<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ShippingChargeController extends Controller
{

    public function index()
    {
        $shipping = ShippingCharge::with('country')->get();
        // dd($shipping);
        $country = Country::all();
        return view('admin.pages.shipping',compact('country','shipping'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => ['required',],
            'amount' => ['required',],
         
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{

            // dd($request->all());
            $shipping = ShippingCharge::where('country_id',$request->country_id)->first();
            if(!empty( $shipping)){
                Session::flash('status', 'error');
                return back()->with("message", 'Your shipping country already exist');
            }
            else{
                $shipping = New ShippingCharge();
                $shipping->country_id = $request->country_id;
                $shipping->amount = $request->amount;
                $shipping->save();
                Session::flash('status', 'success');
                return back()->with("message", 'shipping created successfully');

            }
        }
        
       
    } 
    public function edit($id)
    {
        $shipping = ShippingCharge::find($id);
        return response()->json([
            'status' => 200,
            'shippings' => $shipping,
        ]);
    }
        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->editId;
        $shipping = ShippingCharge::find($id);
        $shipping->country_id = $request->country_id;
        $shipping->amount = $request->amount;
       
        $shipping->update();
        Session::flash('status', 'update');
        return back()->with('message', 'The Shipping Update Successfully ');
    }
    public function destroy($id)
    {
        $shipping = ShippingCharge::find($id);

        $shipping->delete();
        Session::flash('status', 'delete');
        return redirect()->back()->with('message', 'shipping delete Succesfully');
    }
}
