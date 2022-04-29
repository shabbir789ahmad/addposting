<?php

namespace App\Http\Traits;
use App\Models\Property;
trait PropertyTrait
 {

  
   function propertyIndex()
   {
      return Property::latest()->select('property','id')->get();
   }


 

 }

?>