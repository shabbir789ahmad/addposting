<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Solid\AllPackage;
class AdsPackageController extends Controller
{   
    protected $package;
    function __construct(AllPackage $package)
    {
      $this->package=$package;
    }

     public function index()
    {   
        $packages=$this->package->get();
        return view('Dashboard.package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.package.create');
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
          
          'package_name'=>'required',
          'package_price'=>'required',
         
         
        ]);

        $data=[

          'package_name'=>$request->package_name,
          'package_price'=>$request->package_price,
          'package_discount'=>$request->package_discount??null,
         
        ];
           return \App\Helpers\Form::createEloquent(new Package, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages=Package::findOrFail($id);
        return view('Dashboard.package.edit',compact('packages'));
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
          
          'package_name'=>'required',
          'package_price'=>'required',
         
        ]);
        $data=[

          'package_name'=>$request->package_name,
          'package_price'=>$request->package_price,
          'package_discount'=>$request->package_discount??null,
         
        ];
        return \App\Helpers\Form::updateEloquent(new Package,$id, $data);
    }
    
    public function discount(Request $request)
    {   
        $id=$request->id;
        $request->validate([
          
          'package_discount'=>'required',
         
        ]);

        
        return \App\Helpers\Form::updateEloquent(new Package,$id, $request->only('package_discount'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Helpers\Form::deleteEloquent(new Package, $id);
    }
}
