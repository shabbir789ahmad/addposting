<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Cart;
use Auth;
use Notification;
use App\Notifications\NewOrderNotification;
use App\Jobs\SendOrderEmailJob;
class CartController extends Controller
{
   public function addToCart($id,Request $req)
    {
      
        $package = Package::findorfail($id);
         
        $cart = session()->get('cart', []);
       
          if(isset($cart[$id])) {
            $cart[$id]['package_ads'] += $req->ads;
            $cart[$id]['package_price'] += $req->price;
        } else {
            $cart[$id] = [
                'id' => $package['id'],
                "package_name" => $package['package_name'],
                "price" => $package['package_price']-$package['package_discount'],
                "package_price" => $req->price,
                "package_ads" => $req->ads,
                

            ];
            
      }
          
        session()->put('cart', $cart);
        return response()->json( 'Package added to cart successfully!');
    }
  
   public function update(Request $request)
    {

        if($request->id && $request->quentity){
            $cart = session()->get('cart');
            $cart[$request->id]["package_ads"] = $request->quentity;
            $cart[$request->id]["package_price"] =$cart[$request->id]["price"] * $request->quentity;
            session()->put('cart', $cart);
            return response()->json(['success', 'Cart updated successfully']);
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
              'item_ads'=>$cart['package_ads'],
              'item_total'=>$cart['package_price'],
              'agent_id'=>Auth::user()->id,
              'approved'=>0,
          ];
         }
         try{

             $order =Cart::create($data);
             
              // Notification::send($order, new NewOrderNotification($order));
             
             //send email
             $details=[
              'email'=>Auth::user()->email,
              'name'=>Auth::user()->user_name,
              'order'=>'Recieved',
              'package'=>'we ve received order For '.$cart['package_name'].' Ads Package and are working on it now.We will email you an update when we ve Approved it.',
             ];

            dispatch(new SendOrderEmailJob($details));

            //forget session
            session()->forget('cart');

            return to_route('vendor.all.add')->with('success','Your Order Has Been Placed');

         }catch(\Exception $e)
         {
            return redirect()->back()->with('success','Could Not Place Order');
         }
           
        
    }
}
