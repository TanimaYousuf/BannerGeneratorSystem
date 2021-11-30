<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            session()->flash('success', 'Logged in successfully!');
            return redirect()->intended(route('banners.index'));
        }else{
            session()->flash('error', 'Invalid username or password!');
            return back();
        }
    }
    public function logout(){  
        Auth::logout();
        return redirect()->route('login');
    }

    public function showSignUpForm()
    {
        return view('backend.auth.signUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users',
            'phone_number' => 'required|max:11|min:11',
            'password' => 'required|max:20|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
       

        $user->save();

        session()->flash('success','User has been created!');
        return redirect()->route('login');
    }

}
