<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Dish;
use App\Models\Order;

use App\Models\Restaurant;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
/*         Gate::define('order-checker', function (User $user, Order $order) {
            $restaurant = $user->restaurants()->first();
            dd($restaurant, $order);
            return $restaurant->id === $order->restaurant_id;
        }); */

        Gate::define('dish-checker', function (User $user, Dish $dish) {
            $restaurant = $user->restaurants()->first();
            return $restaurant->id === $dish->restaurant_id;
        });


        Gate::define('restaurant-checker', function (User $user, Restaurant $restaurant) {
            return $user->id === $restaurant->user_id;
        });
    }
}
