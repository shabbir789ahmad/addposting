<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
class LikeController extends Controller
{
    function like(Request $request)
    {
        $like=Like::where('product_id',$request->id)->first();
       
         if(!empty($like))
         {
            Like::where('product_id',$request->id)->increment('like');
         }else{

            Like::create([
            
             'like'=>1,
             'product_id'=>$request->id,
            ]);
         }
        return response()->json('ok');
    }



    function unlike(Request $request)
    {
        $like=Like::where('product_id',$request->id)->decrement('like');
       
        
        return response()->json('hj');
    }


    
}
