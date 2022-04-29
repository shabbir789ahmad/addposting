<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\scope\VendorScope;
class VendorAds extends Model
{
    use HasFactory;
     protected $fillable=['total_ads','used_ads','agent_id','package_name'];


     protected static function boot()
    {
        parent::boot();
  
        return static::addGlobalScope(new VendorScope);
    }
}
