<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use session;

class UserAuhController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>hash::make($request->password)
        ]);
        if($user){
            return redirect()->route('login')->with('message','Registration successfuly!!');
        }else{
            return back()->with('message','Registration failed!!');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $user = User::where('email',$request->email)->first();
        if($user){
            if(hash::check($request->password, $user->password)){
                $request->session()->put('userId',$user->id);
                return redirect()->route('dashboard')->with('message','login successfuly!!');
            }else{
                return back()->with('message','password not match  !!');
            }
            
        }else{
            return back()->with('message','not registed !!');
        }
    }
    public function dashboard(){
        if(session()->has('userId')){
        $user = User::where('id',session()->get('userId'))->first();
        }
        return view('user.dashboard',compact('user'));
    }
    public function logout(){
        if(session()->has('userId')){
            session()->pull('userId');
            return redirect('login');
         }
    }
}
