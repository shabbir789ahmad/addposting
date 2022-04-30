<?php
namespace app\Solid;
use App\Interface\ProductInterface;
use App\Models\Product;
class GetProduct implements ProductInterface{

   
     function get($agent_id,$company_id)
     {
             $request = app('request');
        $query=Product::
         join('categories','categories.id','products.category_id')
         ->join('agents','agents.id','products.agent_id')
         ->select('products.*','categories.category_name','user_name','user_image','phone','about_me','user_type','email');

         if($agent_id)
         {
           $query=$query->where('products.agent_id',$agent_id);
         }
         if($company_id)
         {
           $query=$query->where('products.company_id',$company_id);
         }

         if($request->agent_id)
         {
           $query=$query->where('products.agent_id',$request->agent_id);
         }
         if($request->category_id)
         {
           $query=$query->where('products.category_id',$request->category_id);
         }
         
        return  $products=$query->get();

          
     }




}


?>