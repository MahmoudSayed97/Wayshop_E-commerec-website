<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class bannersController extends Controller
{
    public function banners(){
        return view('admin.Banners.banners');
    }
    public function addBanner(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $banners=new Banner();
            $banners->name=$data['banner_name'];
            $banners->text_style=$data['text_style'];
            $banners->sort_order=$data['sort_order'];
            $banners->content=$data['content'];
            $banners->link=$data['link'];

            if($request->hasfile('img')){
                $iamge=time().'.'.$data['img']->getClientOriginalExtension();
                $data['img']->move(public_path('uploads/banners'),$iamge);
                $banners->image=$iamge;
            }
            $banners->save();
            return redirect()->back()->with('flash_message_success','Product has been added!!');
        }
        return view('admin.Banners.add-banner');
    }
    public function viewBanner(){
        $banners=Banner::all();
        return view('admin.Banners.banners')->with(compact('banners'));
    }
    public function editBanner(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();
            if($request->hasfile('image')){
                echo $img_temp=Input::file('image');
                $extension=$img_temp->getClientOriginalExtension();
                $filename=rand(111.9999). '.' .$extension;
                $img_path='uploads/products/' .$filename;
                Image::make($img_temp)->resize(500,500)->save($img_path);
                Banner::where(['id'=>$id])->update(['image'=>$filename]);
            }
            Banner::where(['id'=>$id])->update(['name'=>$data['banner_name'],'link'=>$data['link'],'sort_order'=>$data['sort_order'],'text_style'=>
            $data['text_style'],'content'=>$data['content']]);
            return redirect()->back()->with('flash_message_success','Category has been updated!!');
        }
        $banDetails=Banner::where(['id'=>$id])->first();
        return view('admin.Banners.edit-banner')->with(compact('banDetails'));
    }
    public function deleteBanner($id=null){
        Banner::where(['id'=>$id])->delete();
        Alert::success('Deleted Successfully!', 'Success Message');
        return redirect()->back()->with("flash_message_memory","item deleted!!");
    }
    public function updateStatus(Request $request){
        $id=$request->id;
        $status=$request->status;
        Banner::where(['id'=>$id])->update(['status'=>$status]);
    }
}
