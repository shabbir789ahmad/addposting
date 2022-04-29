<?php

namespace App\Http\Traits;
use App\Models\City;
trait CityTrait
 {

  
   function CityIndex()
   {
      return City::latest()->select('city','id')->get();;
   }


 

 }

?>