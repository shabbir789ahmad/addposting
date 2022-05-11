<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Agent;
use App\Jobs\SendWelcomeEmailJob;
use App\Solid\AgentData;
use App\Solid\Message;
class UserController extends Controller
{

    protected $agent;
    protected $message;
    function __construct(AgentData $agent,Message $message)
    {
      $this->agent=$agent;
      $this->message=$message;
    }


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


    function detail($id)
    {
        $vendor=Company::join('agents','companies.id','=','agents.company_id')
        ->where('agents.id',$id)
        ->first();
        return view('Dashboard.vendor.detail',compact('vendor'));
    }

    
    public function update(Request $request)
    {
        
     
        $data=[ 'approve'=>  $request->approve,];
       
        $id=$request->id;

        Agent::where('id',$id)->update($data);

        //find agent by id from agent class in solid dirctory
        $agent= $this->agent->find($id);
       
       //custom email message from solid
       $details=$this->message->message($request->approve,$agent);
       

         dispatch(new SendWelcomeEmailJob($details));
    }

    public function destroy($id)
    {
        Company::where('id', $id)->forceDelete();
        $users=Agent::where('company_id', $id)->Delete();
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
