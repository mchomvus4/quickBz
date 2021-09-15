<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    

    public function ChangePassword(){
        return view('admin.body.change_password');
    }

    public function passwordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
            'message'=>'Password is changed successfuly',
            'alert-type'=>'info',
        );
             return Redirect()->route('login')->with($notification);

            
        }else{
            $notification = array(
            'message'=>'Current Password is Invalid',
            'alert-type'=>'error',
        );
             return Redirect()->back()->with($notification);
            
        }
        
    }
    public function profileupdate(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile',compact('user'));
            }
        }
    }
    public function userprofileupdate(Request $request){
         $user = User::find(Auth::user()->id);
         if($user){
             $user->name = $request['name'];
             $user->email =$request['email'];
             $user->save();

             $notification = array(
            'message'=>'Profile Updated Successfull',
            'alert-type'=>'info',
        );
             return Redirect()->back()->with($notification);
             

         }else{
             return redirect()->back();
         }
    }
   

}
