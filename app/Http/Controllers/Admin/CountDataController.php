<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use DB;
class CountDataController extends Controller
{
    function index()
    {
        $user=User::where('type',0)->count();
        $user1=User::where('type',1)->count();
         
         $chart=DB::select(DB::raw("select count(*) as total_cart, item_name from carts group by item_name"));
         
          $chartdata="";
          foreach($chart as $char){
            $chartdata.="['".$char->item_name."',     ".$char->total_cart."],";
            }
            $arr['chartdata']=rtrim($chartdata,",");

        return view('Dashboard.dashboard',$arr,compact('user','user1'));
    }
}
