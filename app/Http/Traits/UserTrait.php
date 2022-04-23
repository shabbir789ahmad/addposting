<?php

namespace App\Http\Traits;
use App\Models\User;
use App\Models\Labour;
use App\Models\Product;
trait UserTrait
 {

  
   function user($id)
   {
      $user= User::where('id',$id)->select('user_name','user_image','created_at','id','phone','about_me')->first();
      return $user;
   }

   function agent($id)
   {
      $user= User::join('labours','users.id','=','labours.user_id')->where('labours.id',$id)->select('users.user_image','labours.labour_name','labours.labour_image','labours.created_at','labours.id','labours.labour_phone','labours.user_id')->first();
      return $user;
   }

   function allAgent($id)
   {
      $user= Labour::where('user_id',$id)->select('labours.labour_name','labours.labour_image','labours.created_at','labours.id','labours.labour_phone','labours.user_id')->get();
      return $user;
   }

 

 function userData($labour_id,$user_id)
 {
   $query=Product::
         join('categories','categories.id','products.category_id')
         ->select('products.name','products.location','categories.category_name','products.id','products.price','products.total_area','products.created_at');

         if($user_id)
         {
           $query=$query->where('products.user_id',$user_id);
         }
         if($labour_id)
         {
           $query=$query->where('products.labour_id',$labour_id);
         }
         
         $products=$query->get();
         return $products;
 }
}
?>