<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
class UserController extends Controller
{
     public function index(Request $request)
    {
        $query=Agent::where('user_type','vendor')->latest();
        
        if($request->approved)
        {
            $query=$query->where('approve','=',$request->approved);
        }
        $users=$query->get();
        return view('Dashboard.vendor.index',compact('users'));
    }

    
    public function update(Request $request)
    {
        
     
        $data=[ 'approve'=>  $request->approve,];
       
        $id=$request->id;

        Agent::where('id',$id)->update($data);
      
    }

    public function destroy($id)
    {
        $users=User::destroy($id);
        return redirect()->back()->with('success','User Deleted Successfully');
    }
    
     public function index2(Request $request)
    {
        $query=Agent::where('user_type','agent')->latest();
        
        if($request->approved2)
        {
            
            $query=$query->where('approve','=',$request->approved2);
        }
        $users=$query->get();
        return view('Dashboard.users.index',compact('users'));
    }
    
}
