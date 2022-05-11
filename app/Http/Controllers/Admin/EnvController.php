<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Env;
class EnvController extends Controller
{
    function index()
    {
    $env=Env::latest()->first();
    
    return view('Dashboard.env.edit',compact('env'));
  }


  public function update(Request $request,$id)
    {
        $request->validate([

           
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
             
        ]);
      $cred= Env::where('id',$id)->update([
            
            'email' => $request->email,
            'password' => $request->password,
         
        ]);

      
     
        $data = [

           'MAIL_USERNAME' => $request->email,
           'MAIL_FROM_ADDRESS' => $request->email,
           'MAIL_PASSWORD' => $request->password,
           ];

      


            $path = base_path('.env');
           
            if (file_exists($path)) {
                foreach ($data as $key => $value) {
                    file_put_contents($path, str_replace(
                        $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
                    ));
                }
            }

    
     

       return redirect()->back()->with('success','Email Crediential Updated');
    }

}

