<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable=[
      
      'company_name',
     'licenece_no',
     'company_address',
     'zip_code',
     'licenece_image',
     'about_me',
     'deleted_at',
    ];
 }
