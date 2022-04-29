<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Product;
use App\Models\Labour;
use App\Models\Cart;
use App\Models\VendorAds;
use App\Models\AgentAds;
use Auth;
use DB;
class VendorContoller extends Controller
{
    function index()
    {
        return view('vendor.profile.index');
    }

    function update(Request $request, $id)
    {
        $request->validate([
                 'user_name'=>'required',
                 'email'=>'required',
                 'phone'=>'required',
                 'about_me'=>'required',
                 
          ]);
       
          if($request->file('image'))
          {
            $data=[
    
              'user_name'=>$request->user_name,
              'email'=>$request->email,
              'phone'=>$request->phone,
              'about_me'=>$request->about_me,
              'user_image'=>$this->image(),
           ];
          }else
          {
            $data=[
    
              'user_name'=>$request->user_name,
              'email'=>$request->email,
              'phone'=>$request->phone,
              'about_me'=>$request->about_me,
          
           ];
          }
      
      
      return \App\Helpers\Form::UpdateEloquent(new Agent,$id, $data);
    }


    function count()
    {   
        $total_ads=Product::count();
        
        if(Auth::user()->user_type=='vendor')
        {
          $total_package=Cart::count();
          $left_ads= VendorAds::sum('total_ads');

        }else if(Auth::user()->user_type=='agent')
        {
          
          $total_package= AgentAds::sum('used_ads');
          $left_ads= AgentAds::sum('total_ads');
        }
        
        $user=Agent::where('company_id',Auth::user()->company_id)->where('user_type','!=','vendor')->count();
      
        $chart= DB::table('products')->select(DB::raw(' count(*) as total_product, reads_count'))
                     ->where('agent_id', Auth::id())
                     ->groupBy('reads_count')
                     ->get();
                    
          $chartdata="";
          foreach($chart as $char){
            $chartdata.="['".$char->reads_count."',     ".$char->reads_count."],";
            }
            $arr['chartdata']=rtrim($chartdata,",");
        return view('vendor.dashboard',$arr,compact('total_ads','total_package','left_ads','user'));
    }
}
