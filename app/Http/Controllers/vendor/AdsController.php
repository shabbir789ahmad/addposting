<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Property;
use App\Models\Category;
use App\Models\Area;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Feature;
use App\Models\State;
use App\Models\City;
use App\Models\Image;
use App\Http\Traits\ImageTrait;
use DB;
use Auth;
class AdsController extends Controller
{
     use ImageTrait;
    
    public function index()
    {
        $products=Product::where('user_id',Auth::user()->id)->get();
        return view('vendor.ads.index',compact('products'));
    }
    public function index2()
    {
        $properties=Property::all();
        return view('vendor.ads.select_type',compact('properties'));
    }

   public function category($id)
   {
    $data=Category::where('property_id',$id)->get();
    return response()->json($data);
   }
   public function city($id)
   {
    $data=City::where('state_id',$id)->get();
    return response()->json($data);
   }

    public function create($id)
    {
        $categories=Category::findOrFail($id)->value('id');
        $areas=Area::all();
        $states=State::all();
        $subcategories=SubCategory::where('category_id',$id)->get();
        return view('vendor.ads.create',compact('categories','subcategories','areas','states'));
    }

 
    public function store(Request $request)
    {
        
        $request->validate([
          
           'name'=>'required',
           'detail'=>'required',
           'location'=>'required',
           'price'=>'required',
           'areaunit'=>'required',
           'total_area'=>'required',
           'furnished'=>'required',
           //'category_id'=>'required',
           'bedroom'=>'required',
           'bathroom'=>'required',
        ]);
      
        DB::transaction(function() use($request)
        {
            $data=$request->only('name','detail','location','price','areaunit','total_area','furnished','category_id','bedroom','bathroom','user_id');
            $product=Product::create($data);
           
           for($i=0; $i<count($request->feature);$i++)
            {
                    Feature::create([
                    'product_feature'=>$request->feature[$i],
                    'product_id'=>$product->id,
                  ]);
            }
    
            foreach($request->file('image') as $file)
           {
              $ext=$file->getClientOriginalExtension();
              $filename= time().rand(1,100).'.'.$ext;
              $file->move('uploads/product/',$filename);
              
              Image::create([
              
                 'product_images'=>$filename,
                 'product_id'=>$product->id,
              ]);
      
           }
              
       
               
            
        });
        return to_route('ads.index')->with('success','Ads Created');
    }

  
    public function edit($id)
    {
        $ads=Ad::findOrFail($id);
        return view('vendor.ads.edit',compact('ads'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
          
          'category_name'=>'required',
          'image'=>'required',
        ]);
        
        $ads=Ad::where('id',$id)->update(['category_name'=>$request->category_name,'category_image'=>$this->image()]);
        return to_route('ads.index')->with('success','Ads Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads=Ad::destroy($id);
        return redirect()->back()->with('success','Ads Deleted Successfully');
    }
}
