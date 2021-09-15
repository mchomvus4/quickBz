<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;
use Illuminate\Support\Carbon;

class SubscribeController extends Controller
{
  
     public function emailAddress(){
      $subscribes = Subscribe::latest()->paginate(5);
      return view('admin.contact.subscribe',compact('subscribes'));
    }
      public function subscribedUser(Request $request){
          $validateData = $request->validate([
            'email' =>'required',
        ],[
             'email.required' => 'Please Email Address   is required',
        ]);
       
        Subscribe::insert([
            'email' =>$request->email,
            'created_at' =>Carbon::now(),
        ]);

        return Redirect()->route('contactPage')->with('success','Your Email Has Been  Sent Successfull, Thank You For Chosing Us!');
    }

      public function deleteEmail($id){
        Subscribe::find($id)->delete();
        return Redirect()->route('emailAddress')->with('success','Email Deleted Successfull');
    }
}
