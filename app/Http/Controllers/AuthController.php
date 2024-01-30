<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'status' => 'admin',
        // ]);


        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required'
        ]);
        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            $message = 'Invalid email or password!';
            return back()->with('error',$message);
        } else {
            $message = 'Login successful!';
            return redirect()->intended('/admin/dashboard')->with('success', $message);;
        }
    }

    public function  edit()
    {
        $user = auth()->user();
        return view('admin.account.index', ['user' => $user]);
    }
    public function update(Request $request)
    {

        $user = auth()->user();
        $validatedData = $request->validate([
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


        return redirect()->route('admin.admin.account')->with('success', 'Profile updated successfully!');
    }
    public function AdminLogout()
    {
        Auth::logout();
        $message = 'You have been logged out.';
        return redirect()->route('admin.loginview')->with('success', $message);
    }
}
