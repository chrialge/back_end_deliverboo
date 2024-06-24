<?php

use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\Admin\OrderController;
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
Route::get('restaurants/{restaurant:slug}', [RestaurantController::class, 'show']);

//NON è UNA ROUTE DI DINAMICA MA SONO PARAMETRI GET
Route::get('filter', [RestaurantController::class, 'filter']);

//Rotta per ottenere i types da stampare in pagina
Route::get('types', [TypeController::class, 'index']);

//Definisco la rotta per la transazione e la faccio gestire al metodo
Route::post('process-payment', [PaymentController::class, 'managePayment']);

//Definisco la rotta per ottenere il token e il suo metodo
Route::get('pay/token', [PaymentController::class, 'getToken']);
