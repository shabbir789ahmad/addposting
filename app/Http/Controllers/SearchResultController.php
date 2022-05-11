<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\City;
use App\Models\Area;
use App\Models\Agent;
use App\Models\SubCategory;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\CityTrait;
class SearchResultController extends Controller
{
    use CategoryTrait;
    use CityTrait;
    function searchResut(Request $request)
    {
         $categories=$this->categoryIndex();
         $cities=$this->cityindex();
         $areas=Area::latest()->select('areaunit','id')->get();
         $features=SubCategory::latest()->select('sub_category_name')->get();

        $products=Product::with('images')->select('name','id','price','created_at','areaunit','city','bathroom','bedroom','ads_type','category_id','company_id');
       
        if($request->search)
        {
            $products->where('name','like','%'.$request->search.'%');
        }

         if($request->buy_rent)
        {
           $products->where('plot_type','=',$request->buy_rent);
        }
      
         if($request->bedroom)
        {
          $products=$products->where('products.bedroom',$request->bedroom);
        }
      
        if($request->category)
        {
           $products->where('category_id','=',$request->category);
        }

        if($request->city)
        {
            $products->where('city','like','%'.$request->city.'%');
        }

       if($request->areaunit)
        {
            $products->where('areaunit','like','%'.$request->areaunit.'%');
        }

        if($request->plot_type)
        {
            $products->where('plot_type','like','%'.$request->plot_type.'%');
        }

        

         // $products->when(request('amenities'), function ($q)
         // {
         //    return $q->leftjoin('features','products.id','=','features.product_id')->where('features.product_feature','like','%'.request('amenities').'%');
         // });

      // if($request->min_price && $request->max_price)
      // {
      //    $products->wherebetween('price',[$request->min_price, $request->max_price]);
      // }

        
        $products=$products->paginate(20);
         
         foreach($products as $product)
         {
            $product->agent=Agent::where('company_id',$product['company_id'])->where('user_type','vendor')->select('user_image')->first();
         }

        return view('websites.searchresult',compact('products','categories','features','cities','areas'));
    }
}
