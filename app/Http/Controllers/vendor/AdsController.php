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
use App\Models\Type;
use App\Models\City;
use App\Models\Image;
use App\Http\Traits\ImageTrait;
use DB;
use Auth;
use App\Http\Traits\UserTrait;
class AdsController extends Controller
{
     use ImageTrait;
    use UserTrait;
    public function index()
    {
        $user_id=Auth::id();
       $labour_id=null;
        $products= $this->userData($labour_id,$user_id);
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
        $categorie=Category::where('categories.id',$id)->select('categories.id','category_type','categories.property_id')->first();
        $areas=Area::all();
        $states=State::all();
        $ads=Ad::where('user_id',Auth::id())->sum('total_ads');
        $types=Type::where('type_id',$id)->get();
        $subcategories=SubCategory::where('category_id',$id)->get();
    
        return view('vendor.ads.create',compact('categorie','subcategories','areas','states','types','ads'));
    }

 
    public function store(Request $request)
    {
        
        $request->validate([
          
           'name'=>'required',
           'detail'=>'required',
           'location'=>'required',
           'price'=>'required',
           'areaunit'=>'required',
           'city'=>'required',
           'plot_type'=>'required',
           'total_area'=>'required',
        
           //'category_id'=>'required',
           
        ]);
      
        DB::transaction(function() use($request)
        {
            
            $ads=Ad::where('user_id',Auth::id())->where('total_ads','>',0)->first('total_ads');
        // dd($ads);
            if(!$ads==null)
            {
               $product=Product::create([
               
               'name'=>$request->name,
               'detail'=>$request->detail,
               'location'=>$request->location,
               'price'=>$request->price,
               'areaunit'=>$request->areaunit,
               'total_area'=>$request->total_area,
               'furnished'=>$request->furnished,
               'category_id'=>$request->category_id,
               'bedroom'=>$request->bedroom,
               'city'=>$request->city,
               'bathroom'=>$request->bathroom,
               'plot_type'=>$request->plot_type,
               'user_id'=>$request->user_id,
               'labour_id'=>null,
               'type'=>$request->type,

               ]);
               if($request->feature)
              {
                for($i=0; $i<count($request->feature);$i++)
                 {
                    Feature::create([
                    'product_feature'=>$request->feature[$i],
                    'product_id'=>$product->id,
                   ]);
                 }
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
              
              Ad::where('user_id',Auth::id())->where('total_ads','>',0)->first()->decrement('total_ads');
              Ad::where('user_id',Auth::id())->where('total_ads','>',0)->first()->increment('used_ads');

            }else{
               
               return redirect()->back()->with('success','Ads Quota is Empty');
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
        $ads=Product::destroy($id);

        return redirect()->back()->with('success','Ads Deleted Successfully');
    }
}
