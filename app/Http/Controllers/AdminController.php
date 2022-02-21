<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Auth;
class AdminController extends Controller
{
    function adminLogin(Request $req)
    {
     
     $cred=$req->only('email','password');
   
      if(Auth::guard('admin')->attempt($cred,$req->remember))
        {
         
          return redirect()->route('admin.dashboard');
        
        }else
        {
            
          return redirect()->back()->with('error','something is wrong');
        }
    }



    public function logout()
    {
    if(Auth::guard('admin')->logout())
    {
        return redirect(route('admin.login'));
    }
}
    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }
     protected function guard()
    {
        return Auth::guard('admin');
    }
}
