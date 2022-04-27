<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    function create()
    {

        $request->validate([
          
             'company_name'=>'required',
             'licenece_no'=>'required',
             'comany_address'=>'required',
             'city'=>'required',
             'zip_code'=>'required',
             'licenece_image'=>'required',
             'about_me'=>'required',
             'name'=>'required',
             'email'=>['required', 'string', 'email', 'max:255', 'unique:agents'],
             'password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'phone'=>['required', 'min:9', ],
        ]);
       
        $comany=[
          
             'compay_name'=>$request->compay_name,
             'licenece_no'=>$request->licenece_no,
             'city'=>$request->city,
            
             'comany_address'=>$request->comany_address,
             'licenece_image'=>$request->licenece_image,
            
        ];

      
        
         try {
        \DB::beginTransaction();
         
          $comany=Company::create($company);
          $comany=Agent::create([

             'user_name'=>$request->name,
             'email'=>$request->email,
             'password'=>Hash::make($request->employee_password),
             'image'=>$this->image(),
             'phone'=>$request->employee_phone,
             'company_id'=>$company->id,

          ]);

         \DB::commit();
           \App\Helpers\Logger::logActivity(\Route::currentRouteName(),1);
            return to_route('/')->with('flash','success');
           
       } catch (\Exception $e)
        {
            \App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
         return redirect()->back()->with('flash','fail');          
        }
         
    }
}
