<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable=['areaunit'];

    public static function areas()
    {
        return Area::select('id','areaunit')->get();
    }

    public static function find($id)
    {
        return Area::findorfail($id);
    }
}

 
