<?php
namespace App\Http\Traits;
use App\Models\Product;
trait ProductTrait
 {

  
   function products($id)
   {
     $req=App('request');
     $small='';
     $new='';
     $furnish='';
     $area='';
     $city='';
     $price1='';
     $price2='';
     if($req->small != null)
     {
      $small=$req->small;
     }
     if($req->new != null)
     {
      $new=$req->new;
     }
     if($req->furnish != null)
     {
      $furnish=$req->furnish;
     }
     if($req->area != null)
     {
      $area=$req->area;
     }
     if($req->city != null)
     {
      $city=$req->city;
     }
     if($req->price1 != null && $req->price2 != null)
     {
      $price1=$req->price1;
      $price2=$req->price2;
     }
    
       $query=Product::
         join('categories','categories.id','products.category_id')
         ->select('products.name','products.location','categories.category_name','products.id','products.price','products.created_at')
        ->orderBy('products.created_at','Desc')->take(40)->where('products.category_id',$id);
        if($small)
        {
          $query=$query->where('products.bedroom','<=',2);
        }
        if($new)
        {
          $query=$query->whereMonth('products.created_at', date('m'));
        }
        if($furnish)
        {
          $query=$query->where('products.furnished','furnished');
        }
        if($area)
        {
          $query=$query->where('products.areaunit',$area);
        }
        if($city)
        {
          $query=$query->where('products.location',$city);
        }
        if($price1 && $price2)
        {
          $query=$query->wherebetween('products.price',[$price1,$price2]);
        }
        $products=$query->get();
       return $products;
   }

 

 }

?>