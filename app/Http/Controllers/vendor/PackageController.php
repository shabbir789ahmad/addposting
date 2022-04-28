<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Solid\AllPackage;
class PackageController extends Controller
{
     protected $package;
    function __construct(AllPackage $package)
    {
      $this->package=$package;
    }


    
     public function index()
   
    {
        $packages=$this->package->get();
     
        return view('vendor.package.index',compact('packages'));
    }
}
