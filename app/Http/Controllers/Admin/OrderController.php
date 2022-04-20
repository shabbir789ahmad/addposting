<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Ad;
class OrderController extends Controller
{
   
    public function index()
    {
        $cart=User::join('carts','users.id','=','carts.user_id')->select('carts.item_name','carts.item_ads','carts.item_quentity','carts.item_total','carts.approved','users.user_name','users.email','carts.id',)->where('carts.deleted_at',null)->where('approved','=',0)->orderBy('carts.created_at','Desc')->paginate(50);
        return view('Dashboard.adorder.index',compact('cart'));
    }

   
    public function approve(Request $req)
    {
        $cart=Cart::findorfail($req->id);
       $cart->approved=1;
       $cart->save();
        
         $ads=Ad::where('user_id',$cart['user_id'])->first();
         
         if(!$ads==null)
         {
            $ads->total_ads=$ads->total_ads+$cart['item_ads'];
            $ads->save();
         }else
         {
           $adss=new Ad;
           $adss->total_ads=$cart['item_ads'];
           $adss->user_id=$cart['user_id'];
           
           $adss->save();
         }
       
        return response()->json('sdsd');
    }


     public function destroy($id)
    {
  
         return \App\Helpers\Form::DeleteEloquent(new Cart,$id);
    }
}
