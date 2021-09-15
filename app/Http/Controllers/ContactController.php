<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
  

  public function contact(){
      $contacts = Contact::all();
      return view('admin.contact.index',compact('contacts'));
  }

  public function addcontact(){
    return view('admin.contact.create');
  }
   public function add(Request $request){
          $validateData = $request->validate([
            'address' =>'required',
            'email' =>'required',
            'phone' =>'required',
        ],[
             'address.required' => 'Please Address Name is required',
             'email.required' => 'Please Email Address   is required',
             'phone.required' => 'Please Phone Number  is required',
            
        ]);
       
        Contact::insert([
            'address' =>$request->address,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'created_at' =>Carbon::now(),
        ]);

        return Redirect()->route('contact')->with('success','Contact Inserted Successfull');
    }

      public function edit($id){
        $contacts = Contact::find($id);
        return view('admin.contact.edit',compact('contacts'));
    }

            public function update(Request $request,$id){
          $validateData = $request->validate([
            'address' =>'required',
            'email' =>'required',
            'phone' =>'required',
        ],[
             'address.required' => 'Please Address Name is required',
             'email.required' => 'Please Email Address   is required',
             'phone.required' => 'Please Phone Number  is required',
            
        ]);
       
       Contact::find($id)->update([
            'address' =>$request->address,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'created_at' =>Carbon::now(),
        ]);

        return Redirect()->route('contact')->with('success','Contact Updated Successfull');
    }

     public function delete($id){
        Contact::find($id)->delete();
        return Redirect()->route('contact')->with('success','Contact Deleted Successfull');
    }


    ///Home Contact Page 
    public function contactPage(){
        $contacts = DB::table('contacts')->first();
        return view('pages.contact',compact('contacts'));
    }

   public function contactform(Request $request){
          $validateData = $request->validate([
            'name' =>'required',
            'email' =>'required',
            'subject' =>'required',
            'message' =>'required',
        ],[
             'name.required' => 'Please  Name is required',
             'email.required' => 'Please Email Address   is required',
             'subject.required' => 'Please Subject  is required',
             'message.required' => 'Please Messege  is required',
            
        ]);
       
        ContactForm::insert([
            'name' =>$request->name,
            'email' =>$request->email,
            'subject' =>$request->subject,
            'message' =>$request->message,
            'created_at' =>Carbon::now(),
        ]);
      
        return Redirect()->route('contactPage')->with('success','Your Message Has Been  Sent Successfull, Thank You For Chosing Us!');
        
    }

    public function message(){
      $messages = ContactForm::latest()->paginate(5);
      return view('admin.contact.message',compact('messages'));
    }

       public function deleteMessage($id){
        ContactForm::find($id)->delete();
        $notification = array(
            'message'=>'Message Deleted Successfull!',
            'alert-type'=>'error',
        );
        return Redirect()->route('message')->with($notification);
        
    }
}
