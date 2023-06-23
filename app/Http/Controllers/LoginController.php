<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //view login form
    public function viewLogin(){
        return view('login');
    }

    //Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('item-list');
    }

    //login submit function
    public function submitLogin(Request $request){
        $credentials=$request->validate([
            'email'=>'email|required',
            'password'=>'required|min:3'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->hasRole('Admin')){
                return redirect()->route('admin.dashboard');
            }else if(Auth::user()->hasRole('Seller')){
                return redirect()->route('seller.dashboard');
            }else if(Auth::user()->hasRole('Customer')){
                return redirect()->route('customer.dashboard');
            }
            // return redirect()->intended('dashboard');
        }
 
        return back()->with('error','The provided credentials do not match our records.');
    }
}
