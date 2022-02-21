<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'detail',
        'location',
        'price',
        'areaunit',
        'total_area',
        'furnished',
        'category_id',
        'bedroom',
        'bathroom',
        'user_id',
    ];


  public static function products()
    {
        $products=Product::
         join('categories','categories.id','products.category_id')
         ->select('products.name','products.location','categories.category_name','products.id','products.price')
        ->orderBy('products.created_at','Desc')->take(20)->get();
       
        return $products;
    }
}
