<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorAds;
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
use App\Http\Traits\UserTrait;
use App\Solid\GetProduct;
use DB;
use Auth;

class AdsController extends Controller
{
     use ImageTrait;
     use UserTrait;
    
     protected $product;
     function __construct(GetProduct $product)
     {
       $this->product=$product;
     }

    public function index()
    {
        $user_id=Auth::id();
       
       if(Auth::user()->user_type=='vendor')
       {
         $agent_id=null;
         $products= $this->product->get($agent_id,Auth::user()->company_id);
       }
        
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
        $ads=VendorAds::where('agent_id',Auth::id())->get();
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
               'agent_id'=>$request->user_id,
               'company_id'=>Auth::user()->company_id,
               'type'=>$request->type,
               'ads_type'=>$request->ads_type,
               'floor_level'=>$request->floor_level??null,
               'rent_per'=>$request->rent_per??null,

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
              
              if($request->ads_type != 'free')
              {
                if(Auth::user()->user_type=='vendor')
                {
                  $ads=VendorAds::where('agent_id',Auth::id())->where('total_ads','>',0)->where('id',$request->ads_type)->first();
                  $ads->decrement('total_ads');
                  $ads->increment('used_ads');

                }else if(Auth::user()->user_type=='agent')
                {
                 $ads=AgentAds::where('agent_id',Auth::id())->where('total_ads','>',0)->first();
                 $ads->decrement('total_ads');
                  $ads->increment('used_ads');
                }
              
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
