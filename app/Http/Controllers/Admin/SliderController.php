<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
Use App\Http\Traits\ImageTrait;
class SliderController extends Controller
{
  
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('Dashboard.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.slider.create');
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
          
          'heading1'=>'required',
          'heading2'=>'required',
          'image'=>'required',
        ]);

        $data=[

          'heading1'=>  $request->heading1,
          'heading2'=>  $request->heading2,
          'slider'=>$this->image(),
        ];
          return \App\Helpers\Form::createEloquent(new Slider, $data);
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
        $sliders=Slider::findOrFail($id);
        return view('Dashboard.slider.edit',compact('sliders'));
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
          
          'heading1'=>'required',
          'heading2'=>'required',
         
        ]);
        
        if($request->hasfile('image'))
        {
            $data=[
            'heading1'=>$request->heading1,
            'heading2'=>$request->heading2,
            'slider'=>$this->image()
        ];

        }else{
            $data=[
            'heading1'=>$request->heading1,
            'heading2'=>$request->heading2,
            
        ];
        }
        

        return \App\Helpers\Form::updateEloquent(new Slider,$id, $data);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Helpers\Form::deleteEloquent(new Slider,$id);
    }
}
