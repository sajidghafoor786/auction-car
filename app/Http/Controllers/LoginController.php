<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.account.login');
    }
    public function AuthenticateProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email',],
            'password' => ['required', 'string',],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                Session::flash('status', 'success');
                return redirect()->intended(RouteServiceProvider::HOME)->with('message', 'User created successfully!');
            
            } else {
                return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
            }
            // return redirect()->route('user.login')->with('message', 'User created successfully!');
        }
    }
    public function LogOut()
    {
        Auth::logout();
        Session::flash('status', 'success');
        return redirect()->route('user.home')->with('message', 'you are successful logout!');
    }
    public function profile(){
        $user = Auth::user();
        return view('frontend.account.profile' ,compact('user'));
    }
    public function profileUpdate( Request $request){
       $user = User::find($request->id);
         $validator = Validator::validate($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric|digits_between:11,15|unique:users',
         ]);
        // dd($request->all());
        $data = [
            'name'      => $request->input('name'),
            'phone'     => $request->input('phone'),
        ];
         $user->update($data);
        return redirect()->back()->with([
            'message' => 'User updated successfully',
            'status' => 'success'
        ]);
    }
    public function resetFormShow(Request $request){
        $user = Auth::user();
        return view('frontend.account.reset-password',compact('user'));

    }
    public function resetPassword(Request $request){
         $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();

    // Check current password
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect']);
    }

    // Update password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with(['message'=> 'Password updated successfully.' , 'status' => 'success']);
    }
}
