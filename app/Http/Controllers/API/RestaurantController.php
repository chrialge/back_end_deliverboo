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
        $restaurants = Restaurant::with('dishes', 'types')->orderByDesc('id')->paginate(10); //da passare anche orders in futuro
        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }
    public function show($slug, $id)
    {
        $restaurant = Restaurant::with('dishes', 'types')->where('slug', $slug)->where('id', $id)->get();

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

    public function filter(Request $request)
    {
        $ids = $request->get('numbers', []);
        return response()->json([
            'success' => true,
            'received_data' => $ids,
        ]);
        /*  $restaurant = Restaurant::with('dishes', 'types')->where('types', $types)->first(); */
    }
}
