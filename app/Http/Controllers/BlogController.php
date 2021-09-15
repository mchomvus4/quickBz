<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;


class BlogController extends Controller

{
   
    
     public function blog(){
         $blogs = Blog::latest()->paginate(5);
        return view('admin.blog.index',compact('blogs'));
    }

    public function addPost(){
        return view('admin.blog.create');
    }

       public function add(Request $request){
            $validateData = $request->validate([
            'title' =>'required',
            'post_image' =>'required|mimes:jpg,jpeg,png,mp4',
            'post_content'=>'required'
            
        ],[
            'title.required' => 'Please Input Post Title',
            'post_image.min.required' => 'Please Post Image is Required',
            'post_content.required'=>'Please Write Post Content'
        ]);
         $post_image = $request->file('post_image');

        $img_name_gen = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
        Image::make($post_image)->resize(1024,768)->save('image/post/'.$img_name_gen);
        $last_img = 'image/post/'.$img_name_gen;


        Blog::insert([
            'title' =>$request->title,
            'post_content' =>$request->post_content,
            'post_image' =>$last_img,
            'user_id'=>Auth::user()->id,
            'created_at' =>Carbon::now(),
        ]);
       $notification = array(
            'message'=>'Post Inserted Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('blog')->with($notification);
    }

    public function editBlog($id){
        $posts = Blog::find($id);
        return view('admin.blog.edit',compact('posts'));
    }

    
 public function updateBlog(Request $request, $id){
             $validateData = $request->validate([
            'title' =>'required',
            'post_content'=>'required',
            'post_image' =>'required|mimes:jpg,jpeg,png,mp4',
            
        ],[
            'title.required' => 'Please Input Post Title',
            'post_content'=>'Please Write Post Content',
            'post_image.min' => 'Post Longer than 4 Characters ',
        ]);
        $old_image = $request->old_image;
        $post_image = $request->file('post_image');

        if($post_image){
        $img_name_gen = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
        Image::make($post_image)->resize(1024,768)->save('image/post/'.$img_name_gen);
        $last_img = 'image/post/'.$img_name_gen;

        Blog::find($id)->update([
            'title' =>$request->title,
            'post_content' =>$request->post_content,
            'post_image' =>$last_img,
            'created_at' =>Carbon::now(),
        ]);
        
       $notification = array(
            'message'=>'Post updated Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('blog')->with($notification);

        }else{
            Blog::find($id)->update([
            'post_image' =>$request->post_image,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array(
            'message'=>'Image Updated Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('blog')->with($notification);
        }
        
    }


    public function delete($id){
        $image = Blog::find($id);
        $old_image = $image->post_image;
        unlink($old_image);
        Blog::find($id)->delete();

        $notification = array(
            'message'=>'Item delete Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('blog')->with($notification);
         

    }

     public function blogPage(){
         $blogspost = Blog::latest()->paginate(5);
        return view('pages.blog',compact('blogspost'));
    }

    
}
