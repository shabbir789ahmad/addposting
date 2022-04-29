<?php

namespace App\Http\Traits;
use App\Models\User;
use App\Models\Agent;
use App\Models\Product;
trait UserTrait
 {

  
   function agent($id)
   {
      $user= Agent::where('company_id',$id)->select('user_name','user_image','created_at','id','phone','about_me')->get();
      return $user;
   }

   



 

 // function userData($labour_id,$user_id)
 // {
 //   $query=Product::
 //         join('categories','categories.id','products.category_id')
 //         ->select('products.name','products.location','categories.category_name','products.id','products.price','products.total_area','products.created_at');

 //         if($user_id)
 //         {
 //           $query=$query->where('products.user_id',$user_id);
 //         }
 //         if($labour_id)
 //         {
 //           $query=$query->where('products.labour_id',$labour_id);
 //         }
         
 //         $products=$query->get();
 //         return $products;
 // }
}
?>