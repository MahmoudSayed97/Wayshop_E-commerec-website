<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
   public function addCategory(Request $request){
      if($request->isMethod('post')){
         $data=$request->all();
         $category=new Category();
         $category->name=$data['category_name'];
         $category->url=$data['category_Url'];
         $category->parient_id=$data['parient_id'];
         $category->description=$data['category_description'];
         $category->save();
         return redirect('/admin/add-category')->with('flash_message_success','category added successfully');
      }
      $leves=Category::where(['parient_id'=>0])->get();
       return view('admin.Categories.add-category')->with(compact('leves'));
   }
   public function viewCategory(){
       $categories=Category::get();
       return view('admin.Categories.viewcategories')->with(compact('categories'));
   }
    public function editCategory(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['category_description'],'parient_id'=>$data['parient_id'],'url'=>$data['category_Url']]);
            return redirect()->back()->with('flash_message_success','Category has been updated!!');
        }
        $levels=Category::where(['parient_id'=>0])->get();
        $catDetails=Category::where(['id'=>$id])->first();
        return view('admin.Categories.edit-category')->with(compact('levels','catDetails'));
    }
    public function deleteCategory($id=null){
       Category::where(['id'=>$id])->delete();
        Alert::success('Deleted Successfully!', 'Success Message');
        return redirect()->back()->with("flash_message_success","Category deleted successfully!!");
    }
    public function updateStatus(Request $request){
        $id=$request->id;
        $status=$request->status;
        Category::where(['id'=>$id])->update(['status'=>$status]);

    }

}
