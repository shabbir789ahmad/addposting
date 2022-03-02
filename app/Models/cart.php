<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
class Cart extends Model
{
    use HasFactory,Notifiable;
    use SoftDeletes;
    protected $fillable=[
    
       'item_name',
       'item_quentity',
       'item_total',
       'item_ads',
       'user_id',
    ];
}
