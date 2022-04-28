<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
use App\Models\Cart;
use App\Models\Package;
use App\Models\Message;
use DB;
class CountDataController extends Controller
{
    function index()
    {
        $user=User::count();
        $user1=Agent::count();
        $package=Package::count();
        $message=Message::count();
        $messages=Message::All();
        
         $chart=DB::select(DB::raw("select count(*) as total_cart, item_name from carts group by item_name"));
         
          $chartdata="";
          foreach($chart as $char){
            $chartdata.="['".$char->item_name."',     ".$char->total_cart."],";
            }
            $arr['chartdata']=rtrim($chartdata,",");

        return view('Dashboard.dashboard',$arr,compact('user','user1','package','message','messages'));
    }
}
