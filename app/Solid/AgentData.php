<?php
namespace app\Solid;
use App\Interface\CrudInterface;

use App\Models\Agent;
class AgentData {

   
     function find($id)
     {
        return Agent::where('id',$id)->select('email','user_name')->first();
     }

}


?>