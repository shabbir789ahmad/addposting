<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Labour;
use App\Models\Cart;
use App\Models\AAd;
use App\Models\Ad;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\UserTrait;
class LabourContoller extends Controller
{
    use ImageTrait;
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Cart::join('ads','carts.id','=','ads.cart_id')->select('carts.item_name','ads.*')->where('total_ads','>',0)->withTrashed()->get();
        $labours=$this->allAgent(Auth::id());//user trait
        $aads=AAd::get();
        return view('vendor.user.index',compact('labours','ads','aads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          
             'employee_name'=>'required',
             'email'=>['required', 'string', 'email', 'max:255', 'unique:labours'],
             'employee_password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'employee_phone'=>['required', 'min:6', ],
        ]);
       
        $data=[
          
             'labour_name'=>$request->employee_name,
             'email'=>$request->email,
             'password'=>Hash::make($request->employee_password),
             'labour_image'=>$this->image(),
             'labour_phone'=>$request->employee_phone,
             'user_id'=>Auth::id(),
        ];
        //dd($data);
         return \App\Helpers\Form::CreateEloquent(new Labour, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labour=Labour::findOrFail($id);
        return view('vendor.user.edit',compact('labour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          
             'employee_name'=>'required',
             'employee_email'=>['required'],
             'employee_password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'employee_phone'=>['required', 'min:6', ],
        ]);
       
        $data=[
          
             'labour_name'=>$request->employee_name,
             'labour_email'=>$request->employee_email,
             'labour_password'=>$request->employee_password,
             'labour_image'=>$this->image(),
             'labour_phone'=>$request->employee_phone,
        ];
         return \App\Helpers\Form::UpdateEloquent(new Labour,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Helpers\Form::DeleteEloquent(new Labour,$id);
    }

    function assignAd(Request $req)
    {
        $adds=AAd::create([
           
           'total_ads'=>$req->total_ads,
           'ad_id'=>$req->ads_id,
           'labour_id'=>$req->labour_id,
        ]);
         $ad=Ad::findOrFail($req->ads_id);
         $ad->total_ads=$ad->total_ads-$req->total_ads;
         $ad->save();

        return redirect()->back()->with('success','Ads Assign to this user');
    }
}
