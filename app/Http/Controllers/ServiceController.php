<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Image;

class ServiceController extends Controller
{
    

public function service(){
    $services = Service::latest()->paginate(12);
    return view('admin.service.index', compact('services'));
}
 public function addService(){
        return view('admin.service.create');
    }

         public function add(Request $request){
            $validateData = $request->validate([
            'title' =>'required',
            'service_image' =>'required|mimes:jpg,jpeg,png',
            'description'=>'required'
            
        ],[
            'title.required' => 'Please Input Service Title',
            'service_image.min' => 'Please Image is Required ',
            'description.required'=>'Please Write Service Description'
        ]);
         $service_image = $request->file('service_image');

        $img_name_gen = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
        Image::make($service_image)->resize(300,200)->save('image/service/'.$img_name_gen);
        $last_img = 'image/service/'.$img_name_gen;


        Service::insert([
            'title' =>$request->title,  
            'description' =>$request->description,
            'service_image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);
       
         return Redirect()->route('service')->with('success','Service Inserted Successfull');

    }
     public function editService($id){
        $services = Service::find($id);
        return view('admin.service.edit',compact('services'));
    }

     public function updateService(Request $request, $id){
             $validateData = $request->validate([
            'title' =>'required',
            'description'=>'required',
            'service_image' =>'required|mimes:jpg,jpeg,png',
            
        ],[
            'title.required' => 'Please Input Post Title',
            'description'=>'Please Write Service Description',
            'service_image.min' => 'Post Longer than 4 Characters ',
        ]);
        $old_image = $request->old_image;
        $service_image = $request->file('service_image');

        if($service_image){
        $img_name_gen = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
        Image::make($service_image)->resize(300,200)->save('image/service/'.$img_name_gen);
        $last_img = 'image/service/'.$img_name_gen;

        Service::find($id)->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'service_image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);

       
        return Redirect()->route('service')->with('success','content updated Successfull');

        

        }else{
            Service::find($id)->update([
            'service_image' =>$request->service_image,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'Service Name updated Successfull',
            'alert-type'=>'success',
        );
        return Redirect()->route('service')->with('success','Image Successfull');
       
        }
        
    }

      public function delete($id){
        $image = Service::find($id);
        $old_image = $image->service_image;
        unlink($old_image);
        Service::find($id)->delete();

         return Redirect()->route('service')->with('success','Service delete Successfull');

    }


      public function servicePage(){
         $services = Service::latest()->paginate(5);
        return view('pages.service',compact('services'));
    }
}
