<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    function index()
    {
        return view('websites.agent');
    }
}
