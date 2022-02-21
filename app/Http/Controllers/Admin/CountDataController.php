<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class CountDataController extends Controller
{
    function index()
    {
        $user=User::where('type',0)->count();
        $user1=User::where('type',1)->count();
        return view('Dashboard.dashboard',compact('user','user1'));
    }
}
