<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Http\Requests\Admin\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Admin\Restaurant\UpdateRestaurantRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.restaurants.index', ['restaurants' => Restaurant::where('user_id', Auth::id())->orderByDesc('id')->get()]);
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
        $slug = Str::slug($val_data['name'], '-');
        $val_data['slug'] = $slug;
        $val_data['user_id'] = Auth::id();

        //Creating new istance
        $restaurant = Restaurant::create($val_data);

        return to_route('admin.restaurants.index')->with('message', "You have created $restaurant->name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //Validation
        $val_data = $request->validated();

        //Creating a slug content
        $slug = Str::slug($val_data['name'], '-');
        $val_data['slug'] = $slug;

        //Creating new istance
        $restaurant->update($val_data);

        return to_route('admin.restaurants.index')->with('message', "You have updated $restaurant->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->back()->with('message', "You have delete $restaurant->name");
    }
}
