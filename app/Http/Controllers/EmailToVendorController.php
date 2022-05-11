<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\InqueryMailJob;
class EmailToVendorController extends Controller
{
    function email(Request $request)
    {
    
         $details=[
             
              'email'=>$request->vendor_email,
              'name'=>$request->name,
              'agent'=>$request->agent,
              'image'=>$request->image,
              'property'=>$request->property,
              'user_email'=>$request->email,
              'phone'=>$request->phone,
              'message'=>$request->message,

         ];
         try{
              dispatch(new InqueryMailJob($details));
              return redirect()->back();
           }catch(\Exception $e)
           {
            return redirect()->back()->with('success','opps Something went wrong');
           }
    }
}
