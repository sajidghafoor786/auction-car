<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
  public function adminLoginPage()
    {
        return view('admin.auth.admin-login');
    }
   public function login(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $validated['email'])->first();

    if (!$user) {
        return back()->withInput()
            ->with('error-email', 'The email address is not registered.');
    }

    if ($user->status == 0) {
        return back()->withInput()
            ->with('error-status', 'Your account is inactive. Please contact admin.');
    }

    if (!Hash::check($validated['password'], $user->password)) {
        return back()->withInput()
            ->with('error-password', 'The password is incorrect.');
    }

    Auth::login($user);
    return redirect()->route('admin.dashboard');
}

  public function adminPasswordPage()
    {
        return view('admin.change-password.changePassword');
    }

    public function adminPassword(Request $request)
    {

        $rules = [
            'password' => 'required_with:confirm_password|same:confirm_password|min:8',
        ];

        $validated = $request->validate($rules);

        $user = User::findOrFail((int) $request->user_id);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Password Updated Successfully.']);
    }
}