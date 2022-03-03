<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Cart;
use Auth;
use Notification;
use App\Notifications\NewOrderNotification;
class CartController extends Controller
{
   public function addToCart($id,Request $req)
    {
      
        $package = Package::findorfail($id);
          
        $cart = session()->get('cart', []);
       
          if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $package['id'],
                "package_name" => $package['package_name'],
                "package_price" => $package['package_price'],
                "package_ads" => $package['package_ads'],
                "package_discount" => $package['package_discount'],
                "package_quentity" => 1,
                

            ];
            
      }
          
        session()->put('cart', $cart);
        return response()->json( 'Package added to cart successfully!');
    }
  
   public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["package_quentity"] = $request->quentity;
            session()->put('cart', $cart);
            session()->flash('successs', 'Cart updated successfully');
        }
    }
    
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json( 'Product removed successfully');
        }
    }

    function order(Request $request)
    {
        $cart=session()->get('cart');
      
        foreach($cart as $cart)
        {
          $data=[
             
              'item_name'=>$cart['package_name'],
              'item_quentity'=>$cart['package_quentity'],
              'item_ads'=>$cart['package_ads'],
              'item_total'=>$cart['package_price']*$cart['package_quentity'],
              'user_id'=>Auth::user()->id,
          ];
         }
         //try{

             $order =Cart::create($data);
             session()->forget('cart');
             Notification::send($order, new NewOrderNotification($order));
            return to_route('vendor.dashboard')->with('success','Your Order Has Been Placed');
        // }catch(\Exception $e)
       // {
        //    return redirect()->back()->with('success','Could Not Place Order');
       // }
           
        
    }
}
