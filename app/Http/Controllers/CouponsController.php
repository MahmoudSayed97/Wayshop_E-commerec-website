<?php

namespace App\Http\Controllers;
use App\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if($request->isMethod('post')){
            DB::table('coupons')->insert(['coupon_code'=>$request['coupon_code'],'amount'=>$request['coupon_amount'],
                'amount_type'=>$request['amount_type'], 'expiry_date'=>$request['expiry_date']]);
            return redirect()->back()->with('flash_message_success','Coupon added successfully');
        }
        return view('admin.coupons.add-coupons');
    }
    public function viewCoupon(){
        $coupons=Coupon::all();
        return view('admin.coupons.viewcoupon')->with(compact('coupons'));
    }
    public function updateCouponStatus(Request $request , $id=null){
        DB::table('coupons')->where('id',$id)->update('status',$request['status']);

    }
    public function deleteCoupon($id){
        DB::table('coupons')->where('id',$id)->delete();
        Alert::success('Deleted','Success Message');
        return redirect()->back()->with('flash_message_success','Coupons deleted sucessfully');
    }
    public function editCoupon(Request $request , $id=null){
        if($request->isMethod('post')) {
            DB::table('coupons')->where('id', $id)->update(['coupon_code' => $request['coupon_code'], 'amount' => $request['coupon_amount'],
                'amount_type' => $request['amount_type'], 'expiry_date' => $request['expiry_date']]);
            return redirect()->back()->with('flash_message_success', 'Coupon updated successfully');
        }
        $coupon=Coupon::where(['id'=>$id])->first();
        return view('admin.coupons.edit-coupon')->with(compact('coupon'));
    }
}
