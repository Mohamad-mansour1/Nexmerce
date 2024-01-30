<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account()
    {
        $user = auth()->user();
        return view('website.account', compact('user'));
    }
    
    public function update(Request $request)
    {

        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'required',
            'password' => 'nullable|min:8|different:current_password|same:confirm_password',
            'confirm_password' => 'required_with:password',
        ]);

        $user = User::findOrFail($user->id);

        if ($request->has('current_password') && $request->has('password')) {
            if (Hash::check($request->current_password, $user->password)) {
                $user->name = $request->name;
                $user->email = $request->email;
                if($request->password) {
                    $user->password = Hash::make($request->password);
                }
                $user->save();
            } else {
                return back()->with('current_password', 'Current Passowrd Is Incorrect!');
            }
        }


        return redirect()->route('account')->with('success', 'Profile updated successfully!');
    }
}
