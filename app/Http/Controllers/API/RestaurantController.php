<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }
}
