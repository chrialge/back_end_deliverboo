<?php

use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\TypeController;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get('restaurants/{restaurant:slug}/{id}', [RestaurantController::class, 'show']);

//NON è UNA ROUTE DI DINAMICA MA SONO PARAMETRI GET
Route::get('filter', [RestaurantController::class, 'filter']);

Route::get('types', [TypeController::class, 'index']);
