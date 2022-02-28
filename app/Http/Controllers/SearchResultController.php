<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
class SearchResultController extends Controller
{
    function searchResut(Request $request)
    {
         $categories=Category::latest()->select('category_name','category_image','id')->get();
         $features=SubCategory::latest()->select('sub_category_name')->get();
        $products=Product::query();
        if($request->search)
        {
            $products->where('name','like','%'.$request->search.'%');
        }
        $products->when(request('category'), function ($q)
         {
            return $q->where('category_id',request('category'));
         });
         $products->when(request('city'), function ($q)
         {
            return $q->where('location','like','%'.request('city').'%');
         });

         $products->when(request('areaunit'), function ($q)
         {
            return $q->where('areaunit','like','%'.request('areaunit').'%');
         });

         $products->when(request('amenities'), function ($q)
         {
            return $q->leftjoin('features','products.id','=','features.product_id')->where('features.product_feature','like','%'.request('amenities').'%');
         });

      if($request->min_price && $request->max_price)
      {
         $products->wherebetween('price',[$request->min_price, $request->max_price]);
      }

        
        $products=$products->select('products.name','products.id','products.price','products.category_id','products.location')->paginate(30);
        //dd($products);
        return view('websites.searchresult',compact('products','categories','features'));
    }
}
