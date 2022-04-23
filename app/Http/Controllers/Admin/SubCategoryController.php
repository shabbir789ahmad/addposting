<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\SubCategory;
use  App\Models\Category;
use  App\Models\Property;
class SubCategoryController extends Controller
{
      public function index()
    {
        
        $properties=Property::all();
        $sub_categories=Category::join('sub_categories','categories.id','=','sub_categories.category_id')
        ->select('sub_categories.sub_category_name','categories.category_name','sub_categories.id','categories.property_id')->get();
        return view('Dashboard.sub_category.index',compact('sub_categories','properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $properties=Property::all();
       
        return view('Dashboard.sub_category.create',compact('properties'));
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
          
          'sub_category_name'=>'required',
          'category_id'=>'required',
          'property_id'=>'required',
        ]);

        $data=[

          'sub_category_name'=>  $request->sub_category_name,
          'category_id'=>$request->category_id,
          'property_id'=>$request->property_id,
        ];

       return \App\Helpers\Form::createEloquent(new SubCategory, $data);
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
    {   $properties=Property::all();
        $categories=Category::all();
        $subcategories=SubCategory::findOrFail($id);
        return view('Dashboard.sub_category.edit',compact('subcategories','properties','categories'));
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
          
          'sub_category_name'=>'required',
          'category_id'=>'required',
          'property_id'=>'required',
        ]);

        $data=[

          'sub_category_name'=>  $request->sub_category_name,
          'category_id'=>$request->category_id,
          'property_id'=>$request->property_id,
        ];

       return \App\Helpers\Form::UpdateEloquent(new SubCategory,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        return \App\Helpers\Form::DeleteEloquent(new SubCategory,$id);
       
    }
}
