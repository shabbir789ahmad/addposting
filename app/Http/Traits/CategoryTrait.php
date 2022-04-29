<?php

namespace App\Http\Traits;
use App\Models\Category;
trait CategoryTrait
 {

  
   function categoryIndex()
   {
      return Category::latest()->select('category_name','category_image','id')->get();
   }


 

 }

?>