<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $banners=Banner::where('status','1')->orderby('sort_order','asc')->get();
        $categories=Category::get();
        $products=Product::get();
        return view('wayshop.index')->with(compact('banners'))
            ->with(compact('categories'))->with(compact('products'));
    }
    public function categories($cat_id){
        $categories=Category::get();
        $category_name=Category::where(['id'=>$cat_id])->first();
        $products=Product::where(['cat_id'=>$cat_id])->get();
        $product_name=Product::where(['cat_id'=>$cat_id])->get();
        return view('wayshop.category')->with(compact('categories','products','product_name','category_name'));
    }
}
