<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Product;
use App\Models\State;
use App\Models\Area;
use App\Models\Image;
use App\Models\Price;
use App\Models\User;
use App\Models\Labour;
use App\Models\SubCategory;
use App\Models\Feature;
use App\Models\Feature2;
use App\Http\Traits\ProductTrait;
use Illuminate\Http\Request;
use Cookie;
use Cache;
use App\Http\Traits\UserTrait;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\CityTrait;
use App\Solid\GetProduct;
class HomeController extends Controller
{
    use ProductTrait;
    use UserTrait;
    use CategoryTrait;
    use CityTrait;
   
   protected $product;
    function __construct(GetProduct $product)
    {
        $this->product=$product;
    }

    function index()
    {
        $categories=$this->categoryIndex();

        $sliders=Slider::latest()->take(1)->get();
        $cities=$this->cityindex();

        $features=SubCategory::latest()->select('sub_category_name')->get();
        $areas=Area::all();
        $prices=Price::latest()->select('price1','id')->get();


      
        $products=$this->products($id='');


         return view('websites.landing',compact('categories','sliders','products','cities','areas','prices','features'));
    }

     
    function allAds($id)
    { 
        $categories=$this->categoryIndex();
        $cities=$this->cityindex();
        $areas=Area::all();
        $products=$this->products($id);//from product trait
        return view('websites.all_product',compact('products','categories','cities','areas'));
    }

 function adsDetail($id)
 {
    $pro=new Product;
    $pro->incrementReadCount($id);
        
    $products=Product::
      join('categories','categories.id','products.category_id')
      ->join('agents','agents.id','products.agent_id')
      ->select('products.*','user_name','user_image','phone','about_me','user_type','email')
      ->where('products.id',$id)
      ->first();
         
    $features=Feature::where('product_id',$products->id)->get();
    $features2=Feature2::where('product_id',$products->id)->get();
        
    $images=Image::where('product_id',$id)->get();
        
    $products2=$this->products($products->category_id);
       
    return view('websites.detail',compact('products','images','products2','features','features2'));
    
    }

    // function sortAds()
    // {
    //     $cities=$this->cityindex();
    //     $products=Product::
    //      join('categories','categories.id','products.category_id')
    //      ->join('users','users.id','products.user_id')
    //      ->select('products.name','products.location','categories.category_name','products.id','products.price','users.user_name','users.email','products.detail','areaunit','total_area','products.category_id')->take(20)->get();
         
    //     return view('websites.sort_product',compact('cities','products'));
    // }


    function vendorProduct($id, Request $request)
    { 
        
          $categories = $this->categoryIndex();
          $agents=$this->agent($id);//user trait
  
          $products=$this->product->get($agent_id='',$id);
         
        return view('websites.vendor_account',compact('products','categories','agents'));
    }

    //get data for agent record

    function agentProduct($id, Request $request)
    {  
        
        $categories = $this->categoryIndex();
        $products=$this->product->get($id,$company_id='');
        
        foreach($products as $product) {
       
          $product->img= Image::where('product_id',$product['id'])->first();
         }
        return view('websites.agent_account',compact('products','categories'));
    }
}
