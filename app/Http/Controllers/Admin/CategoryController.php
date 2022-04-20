<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use App\Models\Category;
use App\Models\Property;
class CategoryController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        $properties=Property::all();
        return view('Dashboard.category.index',compact('category','properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $properties=Property::all();

        return view('Dashboard.category.create',compact('properties'));
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
          
          'category_name'=>'required',
          'category_type'=>'required',
          'image'=>'required',
          'property_id'=>'required',
        ]);

        $data=[

          'category_name'=>  $request->category_name,
          'category_type'=>  $request->category_type,
          'category_image'=>  $this->image(),
          'property_id'=>$request->property_id,
        ];

       return \App\Helpers\Form::createEloquent(new Category, $data);
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

        $categ=Category::where('id',$id)->first();

        return view('Dashboard.category.edit',compact('categ','properties'));
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
          
          'category_name'=>'required',
          'category_type'=>'required',
          'property_id'=>'required',
        ]);

        $data=[

          'category_name'=>  $request->category_name,
          'category_type'=>  $request->category_type,
          'category_image'=>  $this->image(),
          'property_id'=>$request->property_id,
        ];

       return \App\Helpers\Form::UpdateEloquent(new Category,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=Category::destroy($id);
        return redirect()->back()->with('success','Category Deleted Successfully');
    }

    function allCategory()
    {
        $categories=Category::latest()->take(12)->get();
        return response()->json($categories);
    }
}
