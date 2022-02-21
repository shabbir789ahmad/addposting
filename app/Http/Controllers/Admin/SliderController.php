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

        Slider::create([

          'heading1'=>  $request->heading1,
          'heading2'=>  $request->heading2,
          'slider'=>$this->image(),
        ]);

        return to_route('slider.index')->with('success','Slider Created');
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
          'image'=>'required',
        ]);
        
        $sliders=Slider::where('id',$id)->update(['heading1'=>$request->heading1,'heading2'=>$request->heading2,'slider'=>$this->image()]);
        return to_route('slider.index')->with('success','Sliders Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders=Slider::destroy($id);
        return redirect()->back()->with('success','Slider Deleted Successfully');
    }
}
