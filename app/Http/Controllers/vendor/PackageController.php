<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
class PackageController extends Controller
{
     public function index()
    {
        $packages=Package::all();
      
        return view('vendor.package.index',compact('packages'));
    }
}
