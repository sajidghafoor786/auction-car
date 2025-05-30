<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        // dd($user);
        return view('admin.pages.user.alluser', compact("user"));
    }
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        //   dd($user);
        return  response([
            'status' => 200,
            'user' => $user
        ]);
    }
    public function update(Request $request)
    {
        // Check if the user with the given id exists
        $existingUser = User::where('email', $request->input('email'))->first();

        if (!$existingUser) {
            // If the user does not exist, handle the error
            Session::flash('status', 'error');
            return back()->with('message', 'User not found');
        }

        if ($existingUser->id != $request->input('id')) {
            // If the email already exists for another user, return an error
            Session::flash('status', 'error');
            return back()->with('message', 'Email already exists for another user');
        } else {
            // Update the user details
            $existingUser->name = $request->name;
            $existingUser->email = $request->email;
            $existingUser->usertype = $request->usertype;
            $existingUser->save();

            Session::flash('status', 'update');
            return back()->with('message', 'User updated successfully');
        }
        
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('status', 'delete');
        return redirect()->back()->with('message', 'user delete Succesfully');
    }
}
