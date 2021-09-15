<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;

class HomeController extends Controller
{
    

    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function addslider(){
        return view('admin.slider.create');
    }

    public function add(Request $request){
          $validateData = $request->validate([
            'title' =>'required',
            'description' =>'required|max:500',
            'image' =>'required|mimes:jpg,jpeg,png',
        ],[
            'title.required'=>'Please Slider Title is required',
            'description.required'=>'Please Slide Description is required',
            'image.min' => 'Please Slider Image is Required ',
        ]);
        $slider_image = $request->file('image');
            //magic of image inentervation
        $img_name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$img_name_gen);
        $last_img = 'image/slider/'.$img_name_gen;

        Slider::insert([
            'title' =>$request->title,
            'description' =>$request->description,
            'image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Slider Inserted Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('slider')->with($notification);
        
    }

      public function edit($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }
      public function update(Request $request, $id){
         $validateData = $request->validate([
            'title' =>'required',
            'description' =>'required|max:500',
          
            
        ]);
        $old_image = $request->old_image;
        $slider_image = $request->file('image');

        if($slider_image){
        $img_name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$img_name_gen);
        $last_img = 'image/slider/'.$img_name_gen;

        Slider::find($id)->update([
            'title' =>$request->title,     
            'description' =>$request->description,
            'image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Slider Updated Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('slider')->with($notification);

        

        }else{
            Slider::find($id)->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Title and Description updated Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('slider')->with($notification);

        }
        
    }


    public function delete($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::find($id)->delete();

        $notification = array(
            'message'=>'Slider Deleted Successfull',
            'alert-type'=>'error',
        );
        return Redirect()->back()->with($notification);
         
}
}