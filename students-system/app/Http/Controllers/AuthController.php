<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with("error", "Credentials not valid");
    }

    public function register(){
        return view('register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('register'))->with("error", "Logain details are not valid");
        }

        return redirect(route('login'))->with("success", "Successfully Registered!");
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}