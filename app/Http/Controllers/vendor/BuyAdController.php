<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
class BuyAdController extends Controller
{
    public function index(Request $req)
    {
        //fread('ab.php','w');
       $package='';
       if($req->package != null)
       {
        $package=$req->package;
       }
     
        $cart=Cart::withTrashed();
        if($package==1)
        {
            $cart=$cart->where('approved','=',1);
        }
        if($package==2)
        {
            $cart=$cart->where('approved','=',0)->whereNull('deleted_at');
        }
        if($package==3)
        {
            $cart=$cart->whereNotNull('deleted_at');
        }
        $carts=$cart->get();
        return view('vendor.buysell.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reOrder($id)
    {   
        $cart=Cart::where('id',$id)->withTrashed()->update(['deleted_at'=>null]);
        return redirect()->back()->with('success','Package order Placed Again');
    }

}
