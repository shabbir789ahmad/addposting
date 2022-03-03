<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Labour;
use App\Models\Product;
use App\Models\AAd;
use Auth;
use DB;
class AgentProfileController extends Controller
{
    function index()
    {
        return view('employee.profile.index');
    }

    function update(Request $request, $id)
    {
        $request->validate([
                 'labour_name'=>'required',
                 'email'=>'required',
                 'labour_phone'=>'required',
                 'about_me'=>'required',
                 'labour_image'=>'required',
          ]);
        if($request->hasfile('labour_image'))

          {
             $file=$request->file('labour_image');
            $ext=$file->getClientOriginalExtension();
            $name= time(). '.' . $ext;
            $file->move('uploads/img/',$name);
          
          }
     
     $data=[
    
      'labour_name'=>$request->labour_name,
      'email'=>$request->email,
      'labour_phone'=>$request->labour_phone,
      'about_me'=>$request->about_me,
      'labour_image'=>$name,
     ]; 
     $d=Labour::findOrFail($id)->update($data);
    return redirect()->route("agent.profile.index")->with('success', 'Profile  Data Updated');
    }


    function count()
    {   
        $total_ads=Product::where('labour_id',Auth::user()->id)->count();
       
        $left_ads=AAd::where('labour_id',Auth::user()->id)->sum('total_ads');
        $used_ads=AAd::where('labour_id',Auth::user()->id)->sum('used_ads');
        
        $chart= DB::table('products')->select(DB::raw(' count(*) as total_product, reads_count'))
                     ->where('labour_id', Auth::id())
                     ->groupBy('reads_count')
                     ->get();
                     // dd($chart);
          $chartdata="";
          foreach($chart as $char){
            $chartdata.="['".$char->reads_count."',     ".$char->reads_count."],";
            }
            $arr['chartdata']=rtrim($chartdata,",");
        return view('employee.dashboard',$arr,compact('total_ads','left_ads','used_ads'));
    }
}
