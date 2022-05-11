<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
   protected $fillable=['category_name','category_image','property_id','category_type'];

   public function products()
    {
        return $this->hasMany(Product::class);
    }

    
    public function getCategoryNameAttribute($value)
    {
        return ucfirst($value);
    }

    public static function categories()
    {
        return Category::latest()->take(4)->get();
    }
}
