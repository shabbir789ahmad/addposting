<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Ad;
class OrderController extends Controller
{
   
    public function index()
    {
        $cart=Cart::all();
        return view('Dashboard.adorder.index',compact('cart'));
    }

   
    public function destroy(Request $req)
    {
        $cart=Cart::findorfail($req->id);
        $cart->delete();
        // dd($cart);
        Ad::create([
    
        'total_ads'=>$cart['item_ads'],
        'user_id'=>$cart['user_id'],
        'cart_id'=>$cart['id'],

        ]);
        return response()->json('sdsd');
    }
}
