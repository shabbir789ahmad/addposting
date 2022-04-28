<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Agent;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ImageTrait;
use Auth;
class CompanyController extends Controller
{
    use ImageTrait;
    use RegistersUsers;


    function Login(Request $request)
    {
        $cred=$request->only('email','password');
      
      if(Auth::guard('agent')->attempt($cred,$request->remember))
        {
         
          return redirect()->route('company.dashboard');
        
        }else
        {
           
          return redirect()->back()->with('agenterror','These credentials Does Not match Our Record');
        }
    }




    function create(Request $request)
    {
          
        $request->validate([
          
             'company_name'=>'required',
             'licenece_no'=>'required',
             'company_address'=>'required',
             'city'=>'required',
             'zip_code'=>'required',
             'licenece_image'=>'required',
             
             'name'=>'required',
             'email'=>['required', 'string', 'email', 'max:255', 'unique:agents'],
             'password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'phone'=>['required', 'min:9', ],
        ]);
    
        $comany=[
          
             'company_name'=>$request->company_name,
             'licenece_no'=>$request->licenece_no,
             'city'=>$request->city,
             'zip_code'=>$request->zip_code,
            
             'company_address'=>$request->company_address,
             'licenece_image'=>$request->licenece_image,
            
        ];

         
        
         try {
       \DB::beginTransaction();
         
          $company=Company::create($comany);

             
      $agent= Agent::create([

             'user_name'=>$request->name,
             'email'=>$request->email,
             'password'=>Hash::make($request->password),
             'user_image'=>$this->image(),
             'phone'=>$request->phone,
             'user_type'=>'vendor',
             'about_me'=>$request->about_me??null,
             'company_id'=>$company->id,

          ]);

         \DB::commit();

      
            return to_route('company.dashboard')->with('flash','success');
       
        
            
           
       } catch (\Exception $e)
        {
           
         return redirect()->back()->with('flash','fail');          
        }
         
    }


     
   public function logout()
    {
        if(Auth::guard('agent')->check()) 
       {
          Auth::guard('agent')->logout();
         return redirect()->route('company.login');
        }

      
    }
    public function __construct()
    {
        $this->middleware('agent.guest')->except('logout');
    }
     protected function guard()
    {
        return Auth::guard('agent');
    }


}
