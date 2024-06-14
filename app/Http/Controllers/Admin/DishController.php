<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Http\Requests\Admin\Dish\StoreDishRequest;
use App\Http\Requests\Admin\Dish\UpdateDishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dishes.index', ['dishes' => Dish::all()]);
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

        //Creating a slug content
        $slug = Str::slug($val_data['name'], '-');
        $val_data['slug'] = $slug;


        //Creating new istance
        $dish = Dish::create($val_data);

        return to_route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        //dd($dish);
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
