<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
class AreaController extends Controller
{
    function allArea()
    {
        $categories=Area::areas();
        return response()->json($categories);
    }



    function index()
    {
        $areaunits=Area::areas();
        return view('Dashboard.area.index',compact('areaunits'));
    }

    function create()
    {
       return view('Dashboard.area.create');
    }

    function store(Request $request)
    {
        $request->validate([
          'areaunit'=>'required',
        ]);

        return \App\Helpers\Form::createEloquent(new Area, $request->only('areaunit'));
    }

    function edit($id)
    {
        $area=Area::find($id);
        return view('Dashboard.area.edit',compact('area'));

    }

    function update(Request $request,$id)
    {
        $request->validate([
          'areaunit'=>'required',
        ]);
        $area=Area::find($id);

        return \App\Helpers\Form::updateEloquent(new Area,$id, $request->only('areaunit'));

    }

    function destroy($id)
    {
        return \App\Helpers\Form::deleteEloquent(new Area,$id);
    }
}
