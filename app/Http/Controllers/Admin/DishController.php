<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Http\Requests\Admin\Dish\StoreDishRequest;
use App\Http\Requests\Admin\Dish\UpdateDishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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

        if ($request->has('image')) {
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }
        //Creating a slug content
        $slug = Str::slug($val_data['name'], '-');
        $val_data['slug'] = $slug;


        //Creating new istance
        $dish = Dish::create($val_data);

        return to_route('admin.dishes.index')->with('message', "You have created $dish->name");
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
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {

        //Validation
        $val_data = $request->validated();

        //Creating a slug content
        $slug = Str::slug($val_data['name'], '-');
        $val_data['slug'] = $slug;

        if ($request->has('image')) {

            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }


        //Creating new istance
        $dish->update($val_data);

        return to_route('admin.dishes.index')->with('message', "You have updated $dish->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }
        $dish->delete();
        return redirect()->back()->with('message', "You have delete $dish->name");
    }
}
