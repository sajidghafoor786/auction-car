<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class AdminController extends Controller
{
    /**
     * Display a Dashboard of the resource.
     */
    public function Dashboard()
    {
       return view("admin.dashboard");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $users = User::orderBy('id', 'DESC')
            ->get();

        return view('admin.admin-user.index', ['users' => $users, 'title' => 'Users']);
    }
      public function create() {
        return view('admin.admin-user.create');
    }

    public function edit($id) {
        $user = User::find($id);
        if($user == null)
        {
            return redirect()->route('admin.listUsers')->with('error', 'No user found.');
        }
        return view('admin.admin-user.edit',['user' => $user]);
    }

    public function show($id) {
        $user = User::find($id);

        if ($user == null) {
            return redirect()->back()->with('error', 'No Record Found');
        }

        return view('admin.admin-user.view', ['user' => $user]);
    }

    public function save(request $request) {
        $validator = Validator::validate($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users',
            'user_type' => 'required',
            'phone' => 'required|numeric|digits_between:11,15|unique:users',
            'password' => 'required_with:confirm_password|same:confirm_password|min:6'
        ], [
            'email.email' => 'The email is invalid.',
            'email.unique' => 'The email has already been taken.',
            'phone.unique' => 'The phone has already been taken.',
            'phone.digits_between' => 'The phone number must be between 11 and 15 digits.',
        ]);


        $user = User::Create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'phone'     => $request->input('phone'),
            'user_type' => $request->input('user_type'),
            'password'  => Hash::make($request->input('password')),
            'status'    => $request->input('is_active')
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'User created successfully',
            'redirect_url' => route('admin.listUsers'),
        ]);

    }

    public function destroy(Request $request) {
        $user = User::find($request->user_id);
        if ($user == null) {
            return response()->json(['status' => 0, 'message' => 'User not found.']);
        }
        User::where('id',$request->user_id)->delete();

        return response()->json(['status' => 1, 'message' => 'Record deleted successfully.']);
    }

    public function update(Request $request) {
        $user = User::find($request->id);
        if ($user == null) {
            return redirect()->back()->with('error', 'No Record Found.');
        }

        $rules = [
            'name' => 'required|string|max:150',
            'phone'     => 'required|numeric',
            'user_type'     => 'required|numeric',
        
        ];
        if($user->phone != $request->phone){
            $rules['phone'] = 'required|numeric|unique:users';
        }

        if (!empty($request->password)) {
            $rules['password'] = 'required_with:confirm_password|same:confirm_password|min:6';
        }

        $validator = Validator::validate($request->all(), $rules);

        $userData = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'status' => $request->input('is_active'),
            'user_type' => $request->input('user_type'),
        ];

        if (!empty($request->password)) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        $user->update($userData);
        return response()->json([
            'status' => 1,
            'message' => 'User updated successfully',
            'redirect_url' => route('admin.listUsers'),
        ]);
    }

    public function status(Request $request) {
        $user = User::find($request->user_id);
        if ($user == null) {
            return response()->json(['status' => 0, 'message' => 'User not found.']);
        }

        // if($request->status == 0){
        //     $fromStatus = 'Active';
        // }else{
        //     $fromStatus = 'Inactive';
        // }
        // if($request->status == 1){
        //     $toStatus = 'Active';
        // }else{
        //     $toStatus = 'Inactive';
        // }

        User::where('id',$request->user_id)->update(['status' => $request->status]);

        return response()->json(['status' => 1, 'message' => 'Status changed successfully.']);
    }
}
