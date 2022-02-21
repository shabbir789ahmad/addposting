<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
class PriceController extends Controller
{
    function price()
    {
        $price=Price::all();
        return response()->json($price);
    }
}
