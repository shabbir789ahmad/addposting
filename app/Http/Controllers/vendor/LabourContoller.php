<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Cart;
use App\Models\AgentAds;
use App\Models\VendorAds;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\UserTrait;
use App\Solid\CreateUser;
class LabourContoller extends Controller
{
    use ImageTrait;
    use UserTrait;
    protected $user;
    function __construct(CreateUser $user)
    {
        $this->user=$user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $ads=VendorAds::where('agent_id',Auth::id())->where('total_ads','>',0)->sum('total_ads');

        $labours=$this->user->get(Auth::id());
     
 
       return view('vendor.user.index',compact('labours','ads'));
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
          
             'user_name'=>'required',
             'email'=>['required', 'string', 'email', 'max:255', 'unique:agents'],
             'password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'user_phone'=>['required', 'min:6', ],
        ]);
     
        $data=[
          
             'user_name'=>$request->user_name,
             'email'=>$request->email,
             'password'=>Hash::make($request->password),
             'user_image'=>$this->image(),
             'phone'=>$request->user_phone,
             'about_me'=>$request->about_me,
             'company_id'=>Auth::user()->company_id,
             'user_type'=>'agent',
        ];
        
         $this->user->create($data);
         return to_route('labour.index')->with('success','Agent Created');
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
        $labour=Agent::findOrFail($id);
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
          
             'labour_name'=>'required',
             'email'=>['required'],
             'password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'labour_phone'=>['required', 'min:6', ],
        ]);
       
        $data=[
          
             'labour_name'=>$request->labour_name,
            'email'=>$request->email,
            ' password'=>$request->password,
             'labour_image'=>$this->image(),
             'labour_phone'=>$request->labour_phone,
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
        $query=AgentAds::where('agent_id',$id);;
          $agent_ads=$query->first();
          
          $ads=VendorAds::where('agent_id',Auth::id())->first();
           
           $ads->total_ads=$ads->total_ads + $agent_ads->total_ads;
           $ads->save();
           
          $agent_ads=$query->delete();
        return \App\Helpers\Form::DeleteEloquent(new Agent,$id);
    }


    function assignAd(Request $req)
    {
       $adds=AgentAds::where('agent_id',$req->agent_id)->first();
      
        if(!$adds==null)
        {
           
          $adds->total_ads=$req->total_ads+$adds->total_ads;
           $adds->save();

        }else
        {
          $ads=new AgentAds;
          $ads->total_ads=$req->total_ads;
          $ads->agent_id=$req->agent_id;
           $ads->save();

        }
        
         $ad=VendorAds::where('agent_id',Auth::id())->where('total_ads','>',0)->first();
         $ad->total_ads=$ad->total_ads-$req->total_ads;
         $ad->save();

        return redirect()->back()->with('success','Ads Assign to this user');
    }
}
