<?php

namespace App\Http\Controllers\user\auth;

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
        return view('user.account.login');
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
        return view('user.account.profile');
    }
}
