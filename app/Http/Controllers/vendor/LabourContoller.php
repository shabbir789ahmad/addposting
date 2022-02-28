<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Labour;
use App\Http\Traits\ImageTrait;
class LabourContoller extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labours=labour::all();
        return view('vendor.user.index',compact('labours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.user.create');
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
          
             'labour_name'=>'required',
             'labour_email'=>['required', 'string', 'email', 'max:255', 'unique:labours'],
             'labour_password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'labour_phone'=>['required', 'min:6', ],
        ]);

        $data=[
          
             'labour_name'=>$request->labour_name,
             'labour_email'=>$request->labour_email,
             'labour_password'=>$request->labour_password,
             'labour_image'=>$this->image(),
             'labour_phone'=>$request->labour_phone,
        ];
         return \App\Helpers\Form::CreateEloquent(new Labour, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labour=Labour::findOrFail($id);
        return view('vendor.user.edit',compact('labour'));
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
          
             'labour_name'=>'required',
             'labour_email'=>['required'],
             'labour_password'=>['required', 'string', 'min:8'],
             'image'=>'required',
             'labour_phone'=>['required', 'min:6', ],
        ]);

        $data=[
          
             'labour_name'=>$request->labour_name,
             'labour_email'=>$request->labour_email,
             'labour_password'=>$request->labour_password,
             'labour_image'=>$this->image(),
             'labour_phone'=>$request->labour_phone,
        ];
         return \App\Helpers\Form::UpdateEloquent(new Labour,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Helpers\Form::DeleteEloquent(new Labour,$id);
    }
}
