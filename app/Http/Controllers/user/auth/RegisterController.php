<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        return view('user.account.register');
    }
    public function ProcessRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = new User();
            $user->name = $request->input('name');
            $user->phone_number = $request->input('phone');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Session::flash('status', 'success');
            return redirect()->route('user.login')->with('message', 'User created successfully!');
        }
    }
    
}
