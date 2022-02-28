<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Product;
use App\Models\State;
use App\Models\City;
use App\Models\Area;
use App\Models\Image;
use App\Models\Price;
use App\Models\SubCategory;
use App\Models\Feature;
use App\Http\Traits\ProductTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ProductTrait;
    function index()
    {
        $categories=Category::latest()->select('category_name','category_image','id')->get();
        $sliders=Slider::latest()->take(1)->get();
        $banners=Banner::latest()->take(1)->get();
        $cities=City::latest()->select('city','id')->get();
        $features=SubCategory::latest()->select('sub_category_name')->get();
        $areas=Area::all();
        $prices=Price::latest()->select('price1','id')->get();
        $products=Product::products();
         return view('websites.landing',compact('categories','sliders','banners','products','cities','areas','prices','features'));
    }
    function allAds($id)
    { 
        $categories=Category::all();
        $locations=State::all();
        $areas=Area::all();
        $products=$this->products($id);//from product trait
        return view('websites.all_product',compact('products','categories','locations','areas'));
    }

    function adsDetail($id)
    {
        $products=Product::
         join('categories','categories.id','products.category_id')
         ->join('users','users.id','products.user_id')
         ->select('products.*','users.user_name','users.email','areaunit','total_area','users.phone','users.created_at')
         ->where('products.id',$id)
         ->first();
         
        $features=Feature::where('product_id',$products->id)->get();
      
        $images=Image::where('product_id',$id)->get();
        $products2=$this->products($products->category_id);
       
        return view('websites.detail',compact('products','images','products2','features'));
    }

    function sortAds()
    {
        $cities=City::all();
        $products=Product::
         join('categories','categories.id','products.category_id')
         ->join('users','users.id','products.user_id')
         ->select('products.name','products.location','categories.category_name','products.id','products.price','users.user_name','users.email','products.detail','areaunit','total_area','products.category_id')->take(20)->get();
        return view('websites.sort_product',compact('cities','products'));
    }

    function vendorProduct($id, Request $request)
    {  $category_id='';
       if($request->category_id != null)
       {
         $category_id=$request->category_id;
       }
        
        $categories = Category::with('products')->has('products')->get();
        
        $query=Product::
         join('categories','categories.id','products.category_id')
         ->join('users','users.id','products.user_id')
         ->select('products.name','products.location','categories.category_name','products.id','products.price','users.user_name','users.phone','products.detail','areaunit','total_area','products.category_id','users.created_at','users.user_image','users.about_me')
          ->where('user_id',$id);
         if($category_id)
         {
            $query=$query->where('category_id',$category_id);
         }
          $products=$query->take(20)->get();
        return view('websites.vendor_account',compact('products','categories'));
    }
}
