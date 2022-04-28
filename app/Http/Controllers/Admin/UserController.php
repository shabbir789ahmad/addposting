<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
class UserController extends Controller
{
     public function index()
    {
        $users=Agent::all();
        return view('Dashboard.vendor.index',compact('users'));
    }

    
    public function update(Request $request)
    {
        
     
        $data=[ 'approve'=>  $request->approve,];
        $id=$request->id;
       return \App\Helpers\Form::UpdateEloquent(new User,$id, $data);
    }

    public function destroy($id)
    {
        $users=User::destroy($id);
        return redirect()->back()->with('success','User Deleted Successfully');
    }
    
     public function index2()
    {
        $users=User::all();
        return view('Dashboard.users.index',compact('users'));
    }
    
}
