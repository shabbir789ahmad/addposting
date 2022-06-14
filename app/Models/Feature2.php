<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature2 extends Model
{
    use HasFactory;
    protected $fillable=['detail_feature' ,'product_id'];
}
