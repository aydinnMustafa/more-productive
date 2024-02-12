<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:3|unique:users',
            'password' => 'required|min:6'
        ]);


        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $user = User::create($data);
        if($user){
            return back()->with('success', 'You have registered succesfully.');
        }
            return back()->with('error', 'Something went wrong. Please try again.');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('/'));
        }
        return back()->with('error', 'Login details are not valid.');
    }

    function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
