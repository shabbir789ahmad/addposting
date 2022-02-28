<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labour extends Model
{
    use HasFactory;
    protected $fillable=[
   
        'labour_name',
        'labour_email',
        'email_verified_at',
        'labour_password',
        'labour_image',
        'labour_phone',
    ];
}
