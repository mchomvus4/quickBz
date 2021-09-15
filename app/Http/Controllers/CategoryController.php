<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function categories(){
        $categories = Category::latest()->paginate(5);
        $trash = Category::onlyTrashed()->latest()->paginate(3);
        
        return view('admin.category.index',compact('categories','trash'));
    }

    public function addCategory(Request $request){
        $validateData = $request->validate([
            'catagory_name' =>'required|unique:categories|max:225',
        ],[
            'catagory_name.required' => 'Please the field can\'t be empty',
        ]);

     
        $category = new Category;
        $category->catagory_name = $request->catagory_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        $notification = array(
            'message'=>'Category Inserted Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->back()->with($notification);
        
    }

    public function editCategory($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));

    }

    public function updateCategory(Request $request, $id){
        $update = Category::find($id)->update([
            'catagory_name' => $request->catagory_name,
            'user_id' => Auth::user()->id
        ]);
        $notification = array(
            'message'=>'Category Updated Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route('categories')->with($notification);
        
    }

    public function softdelete($id){
        $delete = Category::find($id)->delete();
        $notification = array(
            'message'=>'Category Soft Deleted Successfull',
            'alert-type'=>'warning',
        );
        return Redirect()->route()->with($notification);
        

    }

    public function restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        $notification = array(
            'message'=>'Category restored Successfull',
            'alert-type'=>'info',
        );
        return Redirect()->route()->with($notification);
        
    }
    public function delete($id){
        $delete = Category::onlyTrashed($id)->find($id)->forceDelete();
        $notification = array(
            'message'=>'Category Permanenty deleted',
            'alert-type'=>'warning',
        );
        return Redirect()->route()->with($notification);
        
    }
}
