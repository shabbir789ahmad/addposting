<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
   use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function loggedOut(Request $request)
    {
          $redirectTo = RouteServiceProvider::HOME; 
          return redirect($redirectTo);
           }

 protected function authenticated(Request $request, $user)
    {
        if(Auth::user()->type==1)
        {

         return redirect('/dashboard');
        }else{
            return redirect('/');
        }
        
    }
     protected function guard()
    {
        return Auth::guard('web');
    }
}
