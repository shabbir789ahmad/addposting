<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
   protected $fillable=['category_name','category_image','property_id'];

   public function products()
    {
        return $this->hasMany(Product::class);
    }
}
