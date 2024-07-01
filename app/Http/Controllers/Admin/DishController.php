<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Http\Requests\Admin\Dish\StoreDishRequest;
use App\Http\Requests\Admin\Dish\UpdateDishRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = [];
        // take user current
        $user = Auth::getUser();
        // dd($user->restaurants());
        $restaurant = $user->restaurants()->where('user_id', $user->id)->first();
        // dd($restaurant);
        if ($restaurant->dishes() != null) {
            $count = Dish::selectraw('count(*) piatti')->where('restaurant_id', $restaurant->id)->get();
        }
        // dd($count);
        if ($restaurant) {
            return view('admin.dishes.index', ['dishes' => Dish::where('restaurant_id', $restaurant->id)->orderBy('name')->paginate(10), 'count' => $count], compact('restaurant'));
        } else {
            return redirect()->back()->with('message', "Accesso negato");
        }
        // take restaurants of the user current
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        //dd($request->all());
        //Validation
        $val_data = $request->validated();

        if ($request->has('image')) {
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }
        //Creating a slug content
        $slug = Str::slug($val_data['name'], '-');
        $val_data['slug'] = $slug;

        // take user current
        $user = Auth::getUser();

        // take restaurants of the user current
        $restaurant = $user->restaurants()->where('user_id', $user->id)->first();

        // try result of restaurants id=1
        // dd($restaurants->find(1)->id);

        // printing restaurant_id
        $val_data['restaurant_id'] = $restaurant->id;


        //Creating new istance
        $dish = Dish::create($val_data);

        return to_route('admin.dishes.index')->with('message', "Hai creato $dish->name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        //dd($dish);
        if (Gate::allows('dish-checker', $dish)) {
            return view('admin.dishes.show', compact('dish'));
        }
        abort(403, "Non hai l'autorizzazione per accedere a questa pagina");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        if (Gate::allows('dish-checker', $dish)) {
            return view('admin.dishes.edit', compact('dish'));
        }
        abort(403, "Non hai l'autorizzazione per accedere a questa pagina");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        if (Gate::allows('dish-checker', $dish)) {

            // Validation
            $val_data = $request->validated();

            // true se la checkbox è selezionata, false altrimenti
            $visibility = $request->has('visibility');

            //Creating a slug content

            $slug = Str::slug($val_data['name'], '-');
            $val_data['slug'] = $slug;

            if ($request->has('image')) {
                if ($dish->image) {
                    Storage::disk('public')->delete($dish->image);
                }
                $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
            }

            // Updating the dish

            $dish->update([
                'name' => $val_data['name'],
                'slug' => $val_data['slug'],
                //Prendo l'immagine esistente se non la cambio
                'image' => $val_data['image'] ?? $dish->image,
                'visibility' => $visibility,
                'ingredients' => $val_data['ingredients'],
                'price' => $val_data['price']
            ]);

            return to_route('admin.dishes.index')->with('message', "Hai modificato  {$dish->name}");
        }

        return to_route('admin.dishes.index')->with('error', 'Non sei autorizzato a modificare questo piatto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if (Gate::allows('dish-checker', $dish)) {

            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }
            $dish->delete();
            return redirect()->back()->with('message', "Hai cancellato $dish->name");
        }
    }
}
