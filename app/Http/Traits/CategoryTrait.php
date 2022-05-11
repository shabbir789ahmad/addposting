<?php

namespace App\Http\Traits;
use App\Models\Category;
use Cache;
trait CategoryTrait
 {

  
   function categoryIndex()
   {

   return  Cache::remember('categories', 15, function() {
      return Category::latest()->select('category_name','category_image','id')->get();
    });
      
   }


 

 }

?>