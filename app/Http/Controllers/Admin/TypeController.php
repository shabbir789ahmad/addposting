<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Category;
class TypeController extends Controller
{
      public function index()
    {
        
        
        $types=Category::join('types','categories.id','=','types.type_id')
        ->select('categories.category_name','types.id','types.type')->get();
        return view('Dashboard.type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
       
        return view('Dashboard.type.create',compact('categories'));
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
          
          'type'=>'required',
          'type_id'=>'required',
        ]);

        $data=[

          'type'=>  $request->type,
          'type_id'=>$request->type_id,
        ];

       return \App\Helpers\Form::createEloquent(new Type, $data);
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
    {   $categories=Category::all();
        $type=Type::findOrFail($id);
        return view('Dashboard.type.edit',compact('type','categories'));
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
          
          'type'=>'required',
          'type_id'=>'required',
        ]);

        $data=[

          'type'=>  $request->type,
          'type_id'=>$request->type_id,
        ];

       return \App\Helpers\Form::UpdateEloquent(new Type,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        return \App\Helpers\Form::DeleteEloquent(new Type,$id);
       
    }
}
