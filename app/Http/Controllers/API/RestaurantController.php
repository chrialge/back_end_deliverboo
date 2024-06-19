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
        $restaurants = Restaurant::with('dishes', 'types')->orderByDesc('id')->paginate(6); //da passare anche orders in futuro
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }
    public function show($slug)
    {
        $restaurant = Restaurant::with('dishes', 'types')->where('slug', $slug)->first();
        if ($restaurant) {
            return response()->json([
                'success' => true,
                'response' => $restaurant,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => '404 Sorry nothing found here!',
            ]);
        }
    }
}
