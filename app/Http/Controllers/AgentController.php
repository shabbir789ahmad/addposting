<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\State;
use App\Helpers\GetNational;
class AgentController extends Controller
{
    function index(Request $request)
    {
        $states=State::states();
        $query=Agent::inRandomOrder();

         if($request->search)
         {
            $query=$query->where('user_name','like','%'.$request->search.'%')->orWhere('national','like','%'.$request->search.'%');
         }

         if($request->designation)
         {
            $query=$query->where('designation','like','%'.$request->designation.'%');
         }
         if($request->states)
         {
            $query=$query->where('national','like','%'.$request->states.'%');
         }
        $agents=$query->get();
        
        //national helper class
        $national=GetNational::sortArray($agents);
       
        return view('websites.agent',compact('agents','states','national'));
    }
}
