<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
class CityController extends Controller
{
     public function index()
    {
        $cities=State::join('cities','states.id','=','cities.state_id')
        ->select('cities.city','states.states','cities.id')->get();
        
        return view('Dashboard.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $states=State::all();
        return view('Dashboard.city.create',compact('states'));
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
          
          'state_id'=>'required',
          'city'=>'required',
        ]);

        $city=City::where('city','=',$request->city)->first();
        if(empty($city))
        {
         $data=[

          'state_id'=>  $request->state_id,
          'city'=>  $request->city,
        ];

       return \App\Helpers\Form::createEloquent(new City, $data);
        }else{
            return redirect()->back()->with('success','City Already Present in Record' );
        }

        
    }

    
    public function edit($id)
    {   
        $city=City::findorfail($id);
        $states=State::all();
  
        return view('Dashboard.city.edit',compact('city','states'));
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
          
          'state_id'=>'required',
          'city'=>'required',
        ]);

        $data=[

          'state_id'=>  $request->state_id,
          'city'=>  $request->city,
        ];

       return \App\Helpers\Form::UpdateEloquent(new City,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Helpers\Form::DeleteEloquent(new City,$id);;
    }
    public function allCity()
    {   
        $city=City::latest()->take(12)->get();
  
        return response()->json($city);
    }
}
