<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function register()
    {
        return view('register');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data=[
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect('/dashboard');
        }else{
            return redirect('/')->with('failed','Email or password is incorrect');
        }
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function prosesRegister(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $data=[
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        User::create($data);
        
        $login=[
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect('/dashboard');
        }else{
            return redirect('/')->with('failed','Email or password is incorrect');
        }
    }
}
