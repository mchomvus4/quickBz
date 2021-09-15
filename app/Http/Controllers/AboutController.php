<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    
    public function HomeAbout(){
        $abouts = HomeAbout::latest()->get();
        return view('admin.about.index',compact('abouts'));
    }

    public function  addabout(){
        return view('admin.about.create');
    }

      public function add(Request $request){
          $validateData = $request->validate([
            'title' =>'required',
            'short_dis' =>'required',
            'long_dis' =>'required',
        ],[
             'title.required' => 'Please Title Name is required',
             'short_dis.required' => 'Please Short Description is required',
             'long_dis.required' => 'Please Long Description is required',
            
        ]);
       
        HomeAbout::insert([
            'title' =>$request->title,
            'short_dis' =>$request->short_dis,
            'long_dis' =>$request->long_dis,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'Content Inserted Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('about')->with($notification);
    }
       public function edit($id){
        $abouts = HomeAbout::find($id);
        return view('admin.about.edit',compact('abouts'));
    }
         public function update(Request $request,$id){
          $validateData = $request->validate([
            'title' =>'required',
            'short_dis' =>'required',
            'long_dis' =>'required',
        ],[
             'title.required' => 'Please Title Name is required',
             'short_dis.required' => 'Please Short Description is required',
             'long_dis.required' => 'Please Long Description is required',
            
        ]);
       HomeAbout::find($id)->update([
            'title' =>$request->title,
            'short_dis' =>$request->short_dis,
            'long_dis' =>$request->long_dis,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'Content Updated Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('about')->with($notification);

        
    }
    public function delete($id){
        HomeAbout::find($id)->delete();

        $notification = array(
            'message'=>'Content Deleted Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('about')->with($notification);

        
    }
    

}
