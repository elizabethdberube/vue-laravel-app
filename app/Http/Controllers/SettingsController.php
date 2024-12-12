<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingsController extends Controller
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
    public function settings()
    {
        $userId = auth()->id();
        $user= User::find($userId);

        return view('settings', array('user' => $user));
    }


public function updateName(Request $request)
{
        # Validation
        $request->validate([
            'userName' => 'required',
            
        ]);


        # Update the new email
        User::whereId(auth()->user()->id)->update([
            'name' => $request->input('userName')
        ]);

        return back()->with("statusOne", "Name changed successfully!");
}

public function updateEmail(Request $request)
{
        # Validation
        $request->validate([
            'userEmail' => 'required',
            
        ]);


        #Update the new email
        User::whereId(auth()->user()->id)->update([
            'email' => $request->input('userEmail')
        ]);

        return back()->with("statusTwo", "Email changed successfully!");
}

   public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        # Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        # Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}
}
