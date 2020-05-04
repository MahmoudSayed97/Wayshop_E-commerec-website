<?php

namespace App\Http\Controllers;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use phpDocumentor\Reflection\Types\Compound;
use PHPUnit\Framework\Constraint\Attribute;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use App\Category;
use App\ProductAttribute;
use App\Coupon;
use App\Cart;
class productController extends Controller
{
    public function addProduct(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
           $product = new Product();
           $product->name=$data["product_name"];
           $product->cat_id=$data['cat_id'];
           $product->code=$data['product_code'];
           $product->color=$data['product_color'];
           if(!empty($data['product_description'])){
           $product->description=$data['product_description'];}
           else{
           $product->description="";}
           $product->price=$data['product_price'];

            if($request->hasfile('img')){

                $iamge=time().'.'.$data['img']->getClientOriginalExtension();
                $data['img']->move(public_path('uploads/products'),$iamge);
                $product->image=$iamge;
            }
           $product->save();
           return redirect('/admin/add-product')->with('message','Product has been added');
        }
        $categories=Category::all();

        return view ('admin.Products.add-product')->with(compact('categories'));
    }
    public function viewProduct(Request $request){
        $products=Product::get();
        return view ('admin.Products.viewproduct')->with(compact('products'));
    }
    public function editProduct(Request $request, $id=null){
                if($request->isMethod('post')){
                    $data=$request->all();
                    if($request->hasfile('image')){
                        $product=new Product();
                        echo $img_temp=Input::file('image');
                        $extension=$img_temp->getClientOriginalExtension();
                        $filename=time(). '.' .$extension;
                        $img_path='uploads/products/' .$filename;
                        Image::make($img_temp)->resize(500,500)->save($img_path);
                        $product->image=$filename;
                    }

                    if(!empty($data['product_description'])){
                        $data['product_description']="";
                    }
            Product::where(['id'=>$id])->update(['name'=>$data['product_name'],'code'=>$data['product_code'],'cat_id'=>$data['cat_id'],'color'=>
            $data['product_color'],'description'=>$data['product_description'],'price'=>$data['product_price']]);
            return redirect()->back()->with('flash_message_success','Product has been updated!!');
        }
        $prodDetails=Product::where(['id'=>$id])->first();
        $categories=Category::all();
        return view('admin.Products.edit-product')->with(compact('prodDetails','categories'));
    }
    public function deleteProduct($id=null){
        $ProductDetaills=
        Product::where(['id'=>$id])->delete();
        Alert::success('Deleted Successfully!', 'Success Message');
        return redirect()->back()->with("flash_message_memory","item deleted!!");
    }
    public function updateStatus(Request $request){
        $id=$request->id;
        $status=$request->status;
        Product::where(['id'=>$id])->update(['status'=>$status]);
}
    public function products($id=null){
        $products=Product::with('attributes')->where(['id'=>$id])->first();
        $images=ProductImage::where(['product_id'=>$id])->get();
        $featuredProducts=Product::where(['featured'=>1])->get();
        return view('wayshop.products-details')->with(compact('products'))->with(compact('images'))->with(compact('featuredProducts'));
    }
    public function addAtrribute(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();
            //echo '<pre>';print_r($data);die;
            foreach ($data['sku'] as $key=>$value){
                //prevent duplicated Sku records
                if(!empty($value)){
                    $countOfSKU=ProductAttribute::where(['sku'=>$value])->count();

                    if($countOfSKU>0) {
                        return redirect()->back()->with('flash_message_success', 'SKU is exists plz select another on');
                    }
                }
                //prevent duplicated size records
                if(!empty($value)){
                    $countOfSize=ProductAttribute::where(['id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($countOfSize>0){
                    return redirect('/admin/add-attributes/'.$id)->with('flash_message_successs',''.$data[size][$key].'Size is exists plz select another on');
                }}
                $attribute=new ProductAttribute();
                $attribute->product_id=$id;
                $attribute->sku=$value;
                $attribute->size=$data['size'][$key];
                $attribute->price=$data['price'][$key];
                $attribute->stock=$data['stock'][$key];
                $attribute->save();
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_successs','Product Attributes added successfully');

        }
        $product=Product::where(['id'=>$id])->first();
        $productDetails=Product::with('attributes')->where(['id'=>$id])->first();
        return view('admin.Products.add-attributes')->with(compact('product'))->with(compact('productDetails'));
    }
    public function deleteAtrribute($id=null){
        ProductAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product Attribute Deleted Successfully');
    }
    public function editAttribut(Request $request, $id){
        if($request->isMethod('post')){
            foreach ($request['attr'] as $key =>$attr){
                ProductAttribute::where(['id'=>$request['attr'][$key]])->update(['sku'=>$request['sku'][$key],
                    'size'=>$request['size'][$key],
                    'price'=>$request['price'][$key],'stock'=>$request['stock'][$key]]);
            }
            return redirect('/admin/add-attributes/'.$id)->with('flash_message_success','Attribute Updated Successfully');
    }
    }
    public function addImages(Request $request, $id=null){
        if($request->isMethod('post')){
            $files=$request->file('image');

            foreach ($files as $file) {
                $image=new ProductImage();
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move(public_path('uploads/products'),$filename);
                $image->image=$filename;
                $image->product_id=$id;
                $image->save();
            }
        }
        $product=Product::where(['id'=>$id])->first();
        $Images=ProductImage::where(['product_id'=>$id])->get();
        return view('admin.Products.add-images')->with(compact('product','Images'));
    }
    public function deleteImage($id=null){
        $productImage=ProductImage::where(['id'=>$id])->first();
        if(file_exists('uploads/products/'.$productImage->image)){
            unlink('uploads/products/'.$productImage->image);
        }
        ProductImage::where(['id'=>$id])->delete();
        Alert::success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_error','image deleted successfully');
    }
    public function updateFeatured(Request $request){
        $id=$request->id;
        $featured=$request->status;
        Product::where(['id'=>$id])->update(['featured'=>$featured]);
    }
    public function updatePrice(Request $request){
        $data=$request->all();
        $getArr=explode("-",$data['sizeObj']);
       $getAttr=ProductAttribute::where(['product_id'=>$getArr[0],'size'=>$getArr[1]])->first();
        echo $getAttr->price;
    }

    public function addCart(Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $sizeArr=explode('-',$request['product_size']);
        if($sizeArr[0]==0){
            return redirect()->back()->with('flash_message_error','Choose Size firstly');

        }
       //echo '<pre>';print_r()
       $session_id=Session::get('session_id');
       if(empty($session_id)){
           $session_id=str_random(40);
           Session::put('session_id',$session_id);
       }
       $countProducts=DB::table('carts')->where(['product_id'=>$request['product_id'],'product_name'=>$request['product_name'],
          'product_color'=>$request['product_color'],'size'=>$sizeArr[1],'user_email'=>'', 'session_id'=>$session_id])->count();
       if($countProducts>0){
           return redirect('/cart')->with('flash_message_error','Product already exists yo can increase quantity');
       }
       else{
       DB::table('carts')->insert(['product_id'=>$request['product_id'],'product_name'=>$request['product_name'],
           'product_code'=>$request['product_code'],'product_color'=>$request['product_color'],'size'=>$sizeArr[1],
           'price'=>$request['product_price'],'quantity'=>$request['quantity'],'user_email'=>'',
           'session_id'=>$session_id]);
       return redirect('/cart')->with('flash_message_success','Product added successfully in cart');
       }
    }
    public function Cart(Request $request){
        $session_id=Session::get('session_id');
        //$userCart=Cart::where(['session_id'=>$session_id])->get();
        $userCart=DB::table('carts')->where(['session_id'=>$session_id])->get();
        /*get the image name from products table and add it in $userCart array*/
        foreach ($userCart as $key=>$cart){
            $getProduct=Product::where(['id'=>$cart->product_id])->first();
            $userCart[$key]->image=$getProduct->image;
        }
        return view('wayshop.products.cart')->with(compact('userCart'));
    }
    public function deleteCartProduct($id=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('carts')->where(['id'=>$id])->delete();
        return redirect('/cart')->with('flash_message_error','Product deleted successfully');
    }
    public function updateQuantityCart($id=null, $quantity){
        DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
        return redirect()->back()->with('flash_message_success','Product quantity updated successfully');
    }

    public function applyCoupon(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $coupon=DB::table('coupons')->where('coupon_code',$request['coupon_code'])->count();
        if($coupon==0){
            return redirect()->back()->with('flash_message_error','Coupon code doesn\'t exists');
        }
       else{
           $expireyDateOrActiveStatus=DB::table('coupons')->where('coupon_code',$request['coupon_code'])->first();
                if($expireyDateOrActiveStatus->expiry_date < date('Y-m-d')){
                    return redirect()->back()->with('flash_message_error','Coupon code is Expired');
                }
                if($expireyDateOrActiveStatus->status==0){
                   return redirect()->back()->with('flash_message_error','Coupon code is not Active');

                }

                $session_id=Session::get('session_id');

                $userCart=Cart::where(['session_id'=>$session_id])->get();
                $total_amount=0;
                foreach ($userCart as $cart){
                    $total_amount += $cart->price * $cart->quantity;
                }
                if($expireyDateOrActiveStatus->amount_type=='Fixed')
                    $CouponAmount=$expireyDateOrActiveStatus->amount;
                else
                    $CouponAmount=$total_amount * ($expireyDateOrActiveStatus->amount / 100);

                Session::put('CouponAmount',$CouponAmount);
                Session::put('CouponCode',$request['coupon_code']);
                return redirect()->back()->with('flash_message_success','Coupon code is successfully Aplied you have Discount have fun !');

        }
    }
    public function checkout(){
        return view('wayshop.products.checkout');
    }
    }

