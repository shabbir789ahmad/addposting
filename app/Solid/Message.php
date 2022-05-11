<?php
namespace app\Solid;
use App\Interface\CrudInterface;

use App\Models\Agent;
class Message {

   
     function message($id,$agent)
     {
       if($id==1)
       {
         $details=[
            
            'email'=>$agent['email'],
            'name'=> 'Congratulation '.$agent['user_name'],
            'approve'=>"Thank you for signup. Your account has been approved",
            'contnue'=>'You can Now Post Ads',
            'about'=>'Integer eget nibh vel massa gravida ullamcorper. Sed a viverra ante. Nullam posuere pellentesque lectus, nec vehicula felis rutrum ac. Maecenas porta facilisis turpis, eget imperdiet purus.'
       ];
       }elseif($id==0)
       {
        $details=[
            
            'email'=>$agent['email'],
            'name'=> 'Opps '.$agent['user_name'],
            'approve'=>"  Your account has been deactivated",
            'contnue'=>'Please Contact to our Administrator For Further Query',
            'about'=>'Integer eget nibh vel massa gravida ullamcorper. Sed a viverra ante. Nullam posuere pellentesque lectus, nec vehicula felis rutrum ac. Maecenas porta facilisis turpis, eget imperdiet purus.'
       ];
       }

       return $details;
     }

}


?>