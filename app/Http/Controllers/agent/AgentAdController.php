<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Property;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Area;
use App\Models\State;
use App\Models\Ad;
use App\Models\AAd;
use App\Models\Type;
use App\Models\Image;
use App\Models\Feature;
use Auth;
use DB;
use App\Http\Traits\UserTrait;
class AgentAdController extends Controller
{
     use UserTrait;
    function index()
    {
       $user_id=null;
       $labour_id=Auth::id();

      $products= $this->userData($labour_id,$user_id);

        return view('employee.ads.index',compact('products'));
    }
    public function index2()
    {
        $properties=Property::all();
        return view('employee.ads.select_type',compact('properties'));
    }
    public function category($id)
   {
    $data=Category::where('property_id',$id)->get();
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
        return view('employee.ads.create',compact('categorie','subcategories','areas','states','types','ads'));
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
           'plot_type'=>'required',
           'city'=>'required',
        
           //'category_id'=>'required',
           
        ]);
      
        DB::transaction(function() use($request)
        {
        
            $ads=AAd::where('labour_id',Auth::id())->where('total_ads','>',0)->first('total_ads');
        
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
               'bathroom'=>$request->bathroom,
               'city'=>$request->city,
               'plot_type'=>$request->plot_type,
               'user_id'=>$request->user_id,
               'labour_id'=>$request->labour_id,
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
              
              AAd::where('labour_id',Auth::id())->where('total_ads','>',0)->first()->decrement('total_ads');
              AAd::where('labour_id',Auth::id())->where('total_ads','>',0)->first()->increment('used_ads');
            }else{
               
               return redirect()->back()->with('success','Ads Quota is Empty');
            } 
            
        });
        return to_route('agent.ads.index')->with('success','Ads Created');
    }
}
