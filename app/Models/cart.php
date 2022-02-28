<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable=[
    
       'item_name',
       'item_quentity',
       'item_total',
       'item_ads',
       'user_id',
    ];
}
