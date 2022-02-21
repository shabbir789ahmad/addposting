<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
class AreaController extends Controller
{
    function allArea()
    {
        $categories=Area::latest()->take(12)->get();
        return response()->json($categories);
    }
}
