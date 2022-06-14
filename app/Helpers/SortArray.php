<?php
namespace App\Helpers;
class SortArray{


	public static function array($products)
	{
     
      $sub2=[];
      $sub3=[];
      $id=0 ;
      
      foreach($products as $product)
      {   

        if($product['ads_type']=='free')
        {
          $sub3[]=$product;
 
        }else
        {
          $sub2[]=$product;
        }
  
        $id=$product['sub_id'];
      }
    
      return $merged=array_merge($sub2,$sub3);
 
	}
}