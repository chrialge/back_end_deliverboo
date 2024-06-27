<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::id();
        $selectedYear = $request->input('year', 2024);
        $restaurant = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get();
        //dd($restaurant);
        $orders = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get()->pluck('orders')->flatten();;
        //dd($orders, $restaurant);
        //dd($orders->first()->created_at);

        $months = [
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,  0,
        ];

        foreach ($orders as $order) {
            //dd($order->created_at->format('Y'));
            for ($i = 0; $i < count($months); $i++) {
                if (intval($order->created_at->format('Y')) == $selectedYear) {
                    if (intval($order->created_at->format('m')) == $i + 1) {
                        $months[$i]++;
                    }
                }
            }
        }

        $chartjs = app()->chartjs
            ->name('pieChartTest') /* Nome grafico */
            ->type('bar') /* tipo di grafico */
            ->size(['width' => 50, 'height' => 50]) /* dimensioni */
            ->labels(['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre']) /* etichette */
            ->datasets([
                [
                    'label' => 'Ordini',
                    'backgroundColor' => ['#4e7d84', '#f918e8', '#01610c', '#594b56', '#072ff6', '#1d2fc6', '#71f45b', '#5be5dc', '#4cf456', '#510008', '#65339e', '#b5268b'], /* colore lable 1, colore lable 2 */
                    'hoverBackgroundColor' => ['#FF6384'],
                    'data' => $months /* percentuale lable 1,  percentuale lable 1  */
                ]
            ])
            ->options([]);

        return view('admin.charts.index', compact('chartjs','selectedYear'));
    }
}
