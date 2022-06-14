<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class State extends Model
{
    use HasFactory;
    protected $fillable=['states'];
 

   function cities()
   {
    return $this->hasMany(City::class);
   }

   public static function states()
    {
        return State::latest()->select('states')->get();
    }
   
}
