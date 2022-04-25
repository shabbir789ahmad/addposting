<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
class AdsPackageController extends Controller
{
     public function index()
    {
        $packages=Package::all();
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
          'package_ads'=>'required',
          'package_price'=>'required',
          'package_duration'=>'required',
         
        ]);

        $data=[

          'package_name'=>$request->package_name,
          'package_ads'=>$request->package_ads,
          'package_price'=>$request->package_price,
          'package_duration'=>$request->package_duration,
         
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
          'package_ads'=>'required',
          'package_price'=>'required',
          'package_duration'=>'required',
         
        ]);
        $data=[

          'package_name'=>$request->package_name,
          'package_ads'=>$request->package_ads,
          'package_price'=>$request->package_price,
          'package_duration'=>$request->package_duration,
         
        ];
        return \App\Helpers\Form::updateEloquent(new Package,$id, $data);
    }
    
    public function discount(Request $request)
    {   
        $id=$request->id;
        $request->validate([
          
          'package_discount'=>'required',
         
        ]);
        $data=[

          'package_discount'=>$request->package_discount,
        ];
        return \App\Helpers\Form::updateEloquent(new Package,$id, $data);
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
