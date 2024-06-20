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
        $types = $request->query('types');
        // $types = [1,2];
        // Accesso al primo elemento -> E' un array non ua stringa
        //$firstType = $types[0];

        //Questa selezione non va bene, errore in console, bisogna fare le join con le altre tabelle
        //$restaurants = Restaurant::with('dishes', 'types')->whereIn('types', $firstType)->first();

        /* SELECT `restaurants`.`name`, `restaurants`.`id` FROM `restaurants` 
        JOIN `restaurant_type` ON restaurants.id = restaurant_type.restaurant_id 
        JOIN `types` ON restaurant_type.type_id = types.id
        WHERE types.id IN (1,3)
        GROUP BY restaurants.id
        HAVING COUNT(types.id) = 2; */

        $restaurants = Restaurant::with('types', 'dishes')->select(['restaurants.*'])
            ->join('restaurant_type', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
            ->join('types', 'restaurant_type.type_id', '=', 'types.id')
            ->whereIn('types.id', $types)
            ->groupBy('restaurants.id')
            ->havingRaw('COUNT(types.id) =' . count($types))->paginate(10);

        return response()->json([
            'success' => true,
            'received_data' => $restaurants,
        ]);
        // if ($restaurants->data == []) {
        //     return response()->json([
        //         'success' => false,
        //         'received_data' => 'Non ce nessun ristorante che corrisponde con le tipologie richieste'
        //     ]);
        // } else {

        // }
    }
}
