<?php

namespace App\Http\Controllers\admin;

use App\Models\CoupenCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DiscountCoupenController extends Controller
{
    public function index()
    {
        $coupen = CoupenCode::orderBy('id', 'ASC')->get();
        return view('admin.pages.coupen', compact('coupen'));
    }
    // create coupen and inserlt in dta base 
    public function create(Request $request)
    {
        // dd($request->all());
        $coupen = new CoupenCode();
        $coupen->code = $request->code;
        $coupen->coupen_name = $request->name;
        $coupen->description = $request->description;
        $coupen->max_uses = $request->max_uses;
        $coupen->max_uses_user = $request->max_uses_user;
        $coupen->discount_amount = $request->d_amount;
        $coupen->min_amount = $request->m_d_amount;
        $coupen->start_at = $request->started_at;
        $coupen->end_at = $request->expired_at;
        $coupen->status = $request->status;
        $coupen->type = $request->d_type;
        $coupen->save();
        Session::flash('status', 'success');
        return back()->with('message', 'The coupen created successfully ');
        // return view('admin.pages.coupen');
    }
    public function edit($id)
    {
        $coupen = CoupenCode::find($id);
        return response()->json([
            'status' => 200,
            'coupen' => $coupen,
        ]);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $coupen = CoupenCode::find($id);
        $coupen->code = $request->code;
        $coupen->coupen_name = $request->name;
        $coupen->description = $request->description;
        $coupen->max_uses = $request->max_uses;
        $coupen->max_uses_user = $request->max_uses_user;
        $coupen->discount_amount = $request->d_amount;
        $coupen->min_amount = $request->m_d_amount;
        $coupen->start_at = $request->started_at;
        $coupen->end_at = $request->expired_at;
        $coupen->status = $request->status;
        $coupen->type = $request->d_type;
        $coupen->update();
        Session::flash('status', 'update');
        return redirect()->back()->with('message', 'coupen updated Succesfully');
    }
    public function destroy($id)
    {
        $coupen = CoupenCode::find($id);
        $coupen->delete();
        Session::flash('status', 'delete');
        return redirect()->back()->with('message', 'coupen delete Succesfully');
    }
}
