<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\NewUser;

use App\Http\Controllers\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect(route('dashboard'));
        }
        return view('layout.login');
    }
    function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
           return redirect(route('dashboard'))->with("success", "you are logged in");
        }
        return redirect(route('login-page'))->with("error", "try agian");

    }
    function Registration(){
        if (Auth::check()){
            return redirect(route('login-page'));
        }
        return view('layout.Registration');
    }
    function Registrationnew(){
        return view('layout.newR');
    }
    function registrationPost(Request $request){
        $request->validate([
            "fullname" => "required",
            "email" => "required",
            "password" => "required"
           ]);
           $user = new User();
           $user->name = $request->fullname;
           $user->email = $request->email;
           $user->password = $request->password;
    
           if($user->save()){
            return redirect(route("login-page"))->with("success", "user create successfully");
           }
           return redirect(route("register-page"))->with("errors", "faild");


    }
    function logout(){
       // Session::flush();
        Auth::logout();
        return redirect(route('login-page'));
    }
    function dashboard(){
        // Session::flush();
        
        return view('layout.dashboard');
     }
     function pandaP(){
        // Session::flush();
        
        return view('layout.panda');
     }
   
     function newRPost(Request $request){
        $request->validate([
            "fullname" => "required",
            "city" => "required",
            "email" => "required",
            "password" => "required"
           ]);
           $usern = new NewUser();
           $usern->name = $request->fullname;
           $usern->city = $request->city;
           $usern->email = $request->email;
           $usern->password = $request->password;
    
           if($usern->save()){
            return redirect(route("login-page"))->with("success", "user create successfully");
           }
           return redirect(route("registernew-page"))->with("errors", "faild");

     }
}
