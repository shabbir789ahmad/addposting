<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Cart;
use App\Models\VendorAds;
use DB;
use App\Jobs\SendOrderEmailJob;
use App\Solid\AgentData;
class OrderController extends Controller
{

    protected $agent;
    function __construct(AgentData $agent)
    {
      $this->agent=$agent;
    }
   
    public function index()
    {
        $cart=Agent::join('carts','agents.id','=','carts.agent_id')
        ->select('carts.item_name','carts.item_ads','carts.item_total','carts.approved','agents.user_name','agents.email','carts.id',)
        ->where('carts.deleted_at',null)
        ->where('approved','=',0)
        ->orderBy('carts.created_at','Desc')
        ->paginate(50);

        return view('Dashboard.adorder.index',compact('cart'));
    }

   
    public function approve(Request $req)
    {
        
        DB::transaction(function() use($req ){

          $cart=Cart::findorfail($req->id);
       
       $cart->approved=1;
       $cart->save();
        
         $ads=VendorAds::where('agent_id',$cart['agent_id'])->where('package_name','=',$cart['item_name'])->first();
     
         if(!$ads==null)
         {
            $ads->total_ads=$ads->total_ads+$cart['item_ads'];
            $ads->save();
         }else
         {
           $adss=new VendorAds;
           $adss->total_ads=$cart['item_ads'];
           $adss->package_name=$cart['item_name'];
           $adss->agent_id=$cart['agent_id'];
           
           $adss->save();
         }

       $agent=$this->agent->find($cart['agent_id']);
         $details=[
              'email'=>$agent['email'],
              'name'=>$agent['user_name'],
              'package'=>'We Heve Approve Your Package For '.$cart['item_name'].' You Can now Post Ads In '.$cart['item_name'] .' Category',
              'order'=>'Approved',
             ];
             
            dispatch(new SendOrderEmailJob($details));

        });
        
       
        return response()->json('sdsd');
    }


     public function destroy($id)
    {
  
         return \App\Helpers\Form::DeleteEloquent(new Cart,$id);
    }
}
