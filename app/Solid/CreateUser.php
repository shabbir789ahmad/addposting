<?php
namespace app\Solid;


use App\Models\Agent;
class CreateUser  {

     function get($id)
     {
        return Agent::leftjoin('agent_ads','agents.id','=','agent_ads.agent_id')
        ->select('agents.user_image','agents.user_name','agents.email','agents.phone','agent_ads.total_ads','agent_ads.used_ads','agents.id','agents.company_id')->where('company_id',$id)->where('user_type','!=','vendor')->get();
       
     }


     function create($data)
     {
        return Agent::create($data);
     }


}


?>