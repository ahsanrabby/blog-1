<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class HomeContrller extends Controller
{
    public function index(){

        $blog = Blog::where('status',1)->with('category:id,category_name')->take(3)->get();

        return view('frontEnd.home.home',[
            'blogs' =>  $blog
        ]);
    }

    public function blogDetails($slug){
        return view('frontEnd.blog.blog-details',[
            'blogDetails' => Blog::where('slug',$slug)->first()
        ]);
    }

    public function blogUserRegister(){
        return view('frontEnd.user.user-register');
    }
    public function saveUser(Request $request){
        Customer::saveUser($request);
        return back();
    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return back();
    }

    public function customerLogIn(){
        return view('frontEnd.user.user-login');
    }

    public function customerLogInCheck(Request $request){
        $customerInfo=Customer::where('email',$request->user_name)
            ->orWhere('phone',$request->user_name)
            ->first();
        if ($customerInfo){
            $existingPassword=$customerInfo->password;
            if (password_verify($request->password,$existingPassword)){

                Session::put('customerId',$customerInfo->id);
                Session::put('customerName',$customerInfo->name);
                return back();

            }else{
                return back()->with('message','please use valid password');
            }

        }else{
            return back()->with('message','please use valid email or phone');
        }

    }

}
