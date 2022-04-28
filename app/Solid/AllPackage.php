<?php
namespace app\Solid;
use App\Interface\CrudInterface;

use App\Models\Package;
class AllPackage implements CrudInterface{

   
     function get()
     {
        return Package::all();
     }

}


?>