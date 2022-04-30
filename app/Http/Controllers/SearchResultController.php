<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\City;
use App\Models\Area;
use App\Models\SubCategory;
class SearchResultController extends Controller
{
    function searchResut(Request $request)
    {
         $categories=Category::latest()->select('category_name','category_image','id')->get();
         $cities=City::latest()->select('city','id')->get();
         $areas=Area::latest()->select('areaunit','id')->get();
         $features=SubCategory::latest()->select('sub_category_name')->get();

        $products=Product::join('categories','categories.id','products.category_id')->select('products.name','products.id','products.price','products.category_id','products.location','categories.category_name','products.bedroom','products.bathroom','products.total_area','products.areaunit','products.city');
       
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

        
        $products=$products->paginate(4);
         foreach($products as $product) {
       
          $product->img= Image::where('product_id',$product['id'])->first();
         }

        return view('websites.searchresult',compact('products','categories','features','cities','areas'));
    }
}
