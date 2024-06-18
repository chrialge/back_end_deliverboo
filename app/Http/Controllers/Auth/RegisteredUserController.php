<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        return view('auth.register', ['types' => Type::all()]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $val_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'name_restaurant' => 'required|min:3|max:50',
            'phone_number' => 'required|min:3|max:20',
            'address' => 'required',
            'vat_number' => 'required|min:11|max:11',
            'types' => 'required|exists:types,id'
        ]);



        // dd($request->all());

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        Auth::login($user);

        if ($request->has('name_restaurant')) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $request->name_restaurant;
            $newRestaurant->slug = Str::slug($newRestaurant->name, '-');
            $newRestaurant->user_id = Auth::id();
            $newRestaurant->phone_number = $request->phone_number;
            $newRestaurant->address = $request->address;
            $newRestaurant->vat_number = $request->vat_number;

            $newRestaurant->save();
            $newRestaurant->types()->attach($val_data['types']);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
