<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
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

    
}
