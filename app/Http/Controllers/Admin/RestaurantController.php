<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Http\Requests\Admin\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Admin\Restaurant\UpdateRestaurantRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Models\Dish;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // take user current
        $user = Auth::getUser();
        // dd($user->restaurants());
        $restaurant = $user->restaurants()->where('user_id', $user->id)->first();
        // dd($restaurant);

        if ($restaurant) {
            return view('admin.dishes.index', ['dishes' => Dish::where('restaurant_id', $restaurant->id)->orderBy('name')->get()]);
        } else {
            return redirect()->back()->with('message', "Sorry you haven't restaurants registered");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        //Validation
        $val_data = $request->validated();

        //Creating a slug content
        $slug_checker = Restaurant::where('name', $val_data['name'])->count();
        if ($slug_checker) {
            $slug = Str::slug($val_data['name'], '-') . '-' . $slug_checker + 1;
        } else {
            $slug = Str::slug($val_data['name'], '-');
        }

        $val_data['slug'] = $slug;
        $val_data['user_id'] = Auth::id();

        if ($request->has('image')) {
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }

        //Creating new istance
        $restaurant = Restaurant::create($val_data);

        return to_route('admin.restaurants.index')->with('message', "You have created $restaurant->name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        if (Gate::allows('restaurant-checker', $restaurant)) {
            return view('admin.restaurants.show', compact('restaurant'));
        }
        abort(403, "Don't try to entry into another restaurant");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        if (Gate::allows('restaurant-checker', $restaurant)) {
            return view('admin.restaurants.edit', compact('restaurant'));
        }
        abort(403, "Don't try to entry into another restaurant");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        if (Gate::allows('restaurant-checker', $restaurant)) {
            //Validation
            $val_data = $request->validated();

            //Creating a slug content
            $slug = Str::slug($val_data['name'], '-');
            $val_data['slug'] = $slug;

            if ($request->has('image')) {

                if ($restaurant->image) {
                    Storage::disk('public')->delete($restaurant->image);
                }
                $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
            }

            //Creating new istance
            $restaurant->update($val_data);

            return to_route('admin.restaurants.index')->with('message', "You have updated $restaurant->name");
        }
        abort(403, "Don't try to entry into another restaurant");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        if (Gate::allows('restaurant-checker', $restaurant)) {


            if ($restaurant->image) {
                Storage::disk('public')->delete($restaurant->image);
            }
            $restaurant->delete();
            return redirect()->back()->with('message', "You have delete $restaurant->name");
        }
    }
}
