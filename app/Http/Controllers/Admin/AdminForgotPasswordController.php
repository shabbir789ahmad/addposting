<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Mail;
use Str,DB;
use Carbon\Carbon;
use App\Models\Admin;
class AdminForgotPasswordController extends Controller
{
    public function index()
      {
         return view('admin.forgotpassword');
      }


      public function store(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('admin.email', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }

      public function showForm($token) { 
         return view('admin.reset', ['token' => $token]);
      }


      function resetPassword(Request $request)
      {
        $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:8|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = Admin::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
         DB::table('password_resets')
                ->where('email' , $request->email )
              ->delete();
  
          return to_route('admin.login')->with('message', 'Your password has been changed! Login To Continue');
      }


}
