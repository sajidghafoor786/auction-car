<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //  ----------  Auth ---------
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                Session::flash('status', 'success');
                Session::flash('message', 'You are logged in!');
                return redirect()->route('user.home');
            } 
            else {
                // dd(session()->all());
                Session::flash('status', 'success');
                Session::flash('message', 'You are logged in!');
                return redirect()->route('Dashboard');
            }
        } 
        else {
            return redirect()->back();
        }

        
    }
    // view for un- authurized user  
    // public function User(){
    //     return view('user.index');  
    // }
}
