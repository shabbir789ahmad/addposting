<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\scope\VendorScope;
class AgentAds extends Model
{
    use HasFactory;


    protected static function boot()
    {
        parent::boot();
  
        return static::addGlobalScope(new VendorScope);
    }
}
