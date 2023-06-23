<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //view register form
    public function viewRegister(){
        return view('register');
    }

    //Register user
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'email|required',
            'password'=>'required|min:3'
        ]);
        DB::beginTransaction();
        try {
            //Create user
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'user_status'=>1,
                'password'=>Hash::make($request->password)
            ]);
    
            //Creare userrole
            $userRoles=new RoleUser();
            $userRoles->role_id=$request->user_type;
            $userRoles->user_id=$user->id;
            $userRoles->save();
            DB::commit();
            return redirect()->route('login.view')->with('register','User created successfully');;
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error','Error in User Registration');
        }
    }

}
