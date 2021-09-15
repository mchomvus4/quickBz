<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Brand;
use\App\Models\Multpicture;
use Illuminate\Support\Carbon;
use Image;
use Auth;
class BrandController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }


    public function brand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function addBrand(Request $request){
         $validateData = $request->validate([
            'brand_name' =>'required|unique:brands|min:4',
            'brand_image' =>'required|mimes:jpg,jpeg,png',
        ],[
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer than 4 Characters ',
        ]);
        $brand_image = $request->file('brand_image');
            //magic of image inentervation
        $img_name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$img_name_gen);
        $last_img = 'image/brand/'.$img_name_gen;

        Brand::insert([
            'brand_name' =>$request->brand_name,
            'brand_image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'Brand Inserted Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->back()->with($notification);
    }

    public function editBrand($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    public function updateBrand(Request $request, $id){
         $validateData = $request->validate([
            'brand_name' =>'required|min:4',
            
        ],[
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer than 4 Characters ',
        ]);
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if($brand_image){
        $img_name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$img_name_gen);
        $last_img = 'image/brand/'.$img_name_gen;

        Brand::find($id)->update([
            'brand_name' =>$request->brand_name,
            'brand_image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Brand Updated Successfull',
            'alert-type'=>'success',
        );
        return Redirect()->back()->with($notification);

        

        }else{
            Brand::find($id)->update([
            'brand_name' =>$request->brand_name,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'Brand Name updated Successfull',
            'alert-type'=>'success',
        );
        return Redirect()->route('brand')->with($notification);
       
        }
        
    }

    public function delete($id){
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();

         $notification = array(
            'message'=>'Brand Deleted Successfull',
            'alert-type'=>'error',
        );
        return Redirect()->back()->with($notification);
        
    }
   
    //This is for multiImages
    public function multimage(){
        $images = Multpicture::all();
        return view('admin.multipicture.index',compact('images'));
    }
    public function addImage(Request $request){
        $image = $request->file('image');
        foreach($image as $multimage){
            //magic of image inentervation
        $img_name_gen = hexdec(uniqid()).'.'.$multimage->getClientOriginalExtension();
        Image::make($multimage)->resize(300,200)->save('image/multi/'.$img_name_gen);
        $last_img = 'image/multi/'.$img_name_gen;

        Multpicture::insert([
            'image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);
    }//end of foreach loop
     $notification = array(
            'message'=>'Brand Inserted Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->back()->with($notification);
        
    }

    public function logout(){
        Auth::logout();

       
        return Redirect()->route('login')->with('success','You have logged out successfuly');
    }
}
