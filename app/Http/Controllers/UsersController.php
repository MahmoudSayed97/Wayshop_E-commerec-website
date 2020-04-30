<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class UsersController extends Controller
{
    public function userLoginRegister(){
        return view('wayshop.users.login-register');
    }

    public function register(Request $request)
    {
        {
            if ($request->isMethod('post')) {
                //validate inputs
                $validateData = $request->validate([
                    'name' => 'required || min:3 | max:200',
                    'email' => 'required |email | unique:users',
                    'password' => 'required | min:6 | max:20'
                ]);
                $data = $request->all();
                DB::table('users')->insert(['name' => $data['name'], 'email' => $data['email'], 'password' => bcrypt($data['password'])]);
                if(Auth::attempt(['email' =>$request['email'],'password'=>$request['password']])){
                    Session::put('frontSession',$request['email']);
                    return redirect('/cart');
                }
            }
        }
    }
        public function logout(){
        Auth::logout();
            Session::forget('frontSession');
        return redirect('/');
        }
        public function login(Request $request){
        if($request->isMethod('post')) {
            /* $validateData=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
         ]);*/
            if(Auth::attempt(['email' =>$request['email'],'password'=>$request['password']])){
                Session::put('frontSession',$request['email']);
                return redirect('/cart');
            }
            else{
                return redirect()->back()->with('flash_message_error','Invalid Email or Password');
            }
               }
        }
        public function account(Request $request){
        return view('wayshop.users.account');
        }
        public function changePassword(Request $request){
            return view('wayshop.users.change-password');
        }
        public function changeAddress(Request $request){
          $user_id=Auth::user()->id;
          $userDeatils=User::find($user_id);
        if($request->isMethod('post')){
            $data=$request->all();
            $user=User::find($user_id);
            $user->name=$data['name'];
            $user->address=$data['address'];
            $user->city=$data['city'];
            $user->state=$data['state'];
            $user->country=$data['country'];
            $user->pincode=$data['pincode'];
            $user->mobile=$data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Account Details Has Been Updated');
        }
        $countries=Country::all();
        return view('wayshop.users.change-address')->with(compact('countries','userDeatils'));
        }
    }
