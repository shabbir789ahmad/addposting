<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Image;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'detail',
        'city',
        'location',
        'price',
        'areaunit',
        'total_area',
        'furnished',
        'category_id',
        'bedroom',
        'bathroom',
        'agent_id',
        'company_id',
        'type',
        'ads_type',
        'floor_level',
        'rent_per',
        'plot_type',
    ];


  public function images()
{
    return $this->hasOne(Image::class);
}





    

    public function incrementReadCount($id) {

    $this->where('id',$id)->increment('reads_count');
   
    }
}
