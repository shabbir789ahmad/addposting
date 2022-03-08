<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Labour;
use App\Models\Cart;
use App\Models\Ad;
use Auth;
use DB;
class VendorContoller extends Controller
{
    function index()
    {
        return view('vendor.profile.index');
    }

    function update(Request $request, $id)
    {
        $request->validate([
                 'user_name'=>'required',
                 'email'=>'required',
                 'phone'=>'required',
                 'about_me'=>'required',
                 'user_image'=>'required',
          ]);
        if($request->hasfile('user_image'))

          {
             $file=$request->file('user_image');
            $ext=$file->getClientOriginalExtension();
            $name= time(). '.' . $ext;
            $file->move('uploads/img/',$name);
          
          }
      
     $data=[
    
              'user_name'=>$request->user_name,
              'email'=>$request->email,
              'phone'=>$request->phone,
              'about_me'=>$request->about_me,
              'user_image'=>$name,
           ]; 
      return \App\Helpers\Form::UpdateEloquent(new User,$id, $data);
    }


    function count()
    {   
        $total_ads=Product::where('user_id',Auth::user()->id)->count();
        $total_package=Cart::where('user_id',Auth::user()->id)->count();
        $left_ads=Ad::where('user_id',Auth::user()->id)->sum('total_ads');
        $labour=Labour::where('user_id',Auth::user()->id)->count();
       //dd($left_ads);
        $chart= DB::table('products')->select(DB::raw(' count(*) as total_product, reads_count'))
                     ->where('user_id', Auth::id())
                     ->groupBy('reads_count')
                     ->get();
                     // dd($chart);
          $chartdata="";
          foreach($chart as $char){
            $chartdata.="['".$char->reads_count."',     ".$char->reads_count."],";
            }
            $arr['chartdata']=rtrim($chartdata,",");
        return view('vendor.dashboard',$arr,compact('total_ads','total_package','left_ads','labour'));
    }
}
