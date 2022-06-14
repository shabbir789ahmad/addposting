<?php
namespace App\Helpers;
/**
 * 
 */
class GetNational 
{
	
  public static	function sortArray($data)
	{
		$national=[];
        foreach($data as $agent)
        {
          if(in_array($agent['national'], $national))
          {

          }else
          {
             array_push($national,$agent['national']);
          }
        }
        return $national;
	}
}

?>