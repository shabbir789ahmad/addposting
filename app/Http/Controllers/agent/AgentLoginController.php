<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AgentLoginController extends Controller
{

  // public function index()
  // {
  //   return view('employee.a');
  // }
  function agentLogin(Request $req)
  {
     
     $cred=$req->only('email','password');
     
      if(Auth::guard('labour')->attempt($cred,$req->remember))
        {
         
          return redirect()->route('agent.dashboard');
        
        }else
        {
            
          return redirect()->back()->with('agenerror','These credentials Does not match our record');
        }
  }



    public function logout()
    {
      if(Auth::guard('labour')->logout())
      {
        return redirect(route('labour.login'));
      }
    }
    public function __construct()
    {
        $this->middleware('labour.guest')->except('logout');
    }
     protected function guard()
    {
        return Auth::guard('labour');
    }

}
