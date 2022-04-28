<?php
namespace app\Solid;
use App\Interface\ProductInterface;
use App\Models\Product;
class GetProduct implements ProductInterface{

   
     function get($agent_id,$company_id)
     {
        $query=Product::
         join('categories','categories.id','products.category_id')
         ->select('products.name','products.location','categories.category_name','products.id','products.price','products.total_area','products.created_at');

         if($agent_id)
         {
           $query=$query->where('products.agent_id',$agent_id);
         }
         if($company_id)
         {
           $query=$query->where('products.company_id',$company_id);
         }
         
         $products=$query->get();
         return $products;
     }

}


?>