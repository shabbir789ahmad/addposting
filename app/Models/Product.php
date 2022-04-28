<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Image;
class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'detail',
        'city',
        'location',
        'price',
        'areaunit',
        'total_area',
        'furnished',
        'category_id',
        'bedroom',
        'bathroom',
        'agent_id',
        'company_id',
        'type',
        'ads_type',
        'floor_level',
        'rent_per',
        'plot_type',
    ];


  public static function products()
    {
        $products=Product::
         join('categories','categories.id','products.category_id')
         ->select('products.name','categories.category_name','products.id','products.price','products.total_area','products.created_at','products.areaunit','products.bedroom','products.bathroom','products.city','products.ads_type')
        ->orderBy('products.created_at','Desc')->take(20)->get();
       
       return $products;
    }


    public function incrementReadCount($id) {

    $this->where('id',$id)->increment('reads_count');
   
    }
}
