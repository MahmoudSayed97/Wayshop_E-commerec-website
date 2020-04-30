<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class adminController extends Controller
{
    public function login(Request $request ){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['username'],'password'=>$data['password'],'is_Admin'=>1])){
            return redirect('admin/dashboard');
            }
        else{
            return redirect('/admin')->with('flash_message_error','Invalid Username or password');
        }
    }
        return view('admin.admin_login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    } 
    public function logout(){
        Session::flush();
        return redirect ('admin')->with('flash_message_success','You loged out');
    }
   
}
