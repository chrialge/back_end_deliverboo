<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $restaurant = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get();
        //dd($restaurant);
        $orders = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get()->pluck('orders')->flatten();;
        //dd($orders, $restaurant);
        //dd($orders->first()->created_at);

        $months = [
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0,
        ];

        foreach ($orders as $order) {
            //dd($order->created_at->format('m'));
            for ($i = 0; $i < count($months); $i++) {
                if (intval($order->created_at->format('m')) == $i + 1) {
                    $months[$i]++;
                }
            }
        }

        $chartjs = app()->chartjs
            ->name('pieChartTest') /* Nome grafico */
            ->type('bar') /* tipo di grafico */
            ->size(['width' => 100, 'height' => 100]) /* dimensioni */
            ->labels(['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre']) /* etichette */
            ->datasets([
                [
                    'label' => 'Ordini',
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#F9CC85'], /* colore lable 1, colore lable 2 */
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#F9CC85'],
                    'data' => $months /* percentuale lable 1,  percentuale lable 1  */
                ]
            ])
            ->options([]);

        return view('admin.charts.index', compact('chartjs'));
    }
}
