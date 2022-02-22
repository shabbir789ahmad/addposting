<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
     public function index()
    {
        $users=User::where('approve',0)->where('type',1)->get();
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
        $users=User::where('approve',0)->where('type',0)->get();
        return view('Dashboard.users.index',compact('users'));
    }
    
}
