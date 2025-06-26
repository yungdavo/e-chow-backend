<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $validated=auth()->attempt([
            'email' =>$request->email,
            'password' => $request->password,
            'is_admin'=>1
        ]);
        if($validated){
            return redirect()->route('admin.dashboard')
            ->with('success','Logged in successfully');
        }else{
            return redirect()->back()
            ->with('error','Invalid Credentials');
        }
    }
}
