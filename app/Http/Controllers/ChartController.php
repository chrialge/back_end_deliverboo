<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->input('year'));
        $user = Auth::id();
        $restaurant = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get();
        //dd($restaurant);
        $orders = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get()->pluck('orders')->flatten();
        //dd($orders, $restaurant);
        //dd($orders->first()->created_at);

        // dd($restaurant[0]['id']);
        $restaurant_id = $restaurant[0]['id'];
        $year = Order::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data')
            ->where('restaurant_id', $restaurant_id)
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();

        $cash = Order::selectRaw('year(created_at) anno, monthname(created_at) mese, count(*) orders, sum(total_price) guadagno')
            ->where('status', '>', 0)
            ->where('restaurant_id', $restaurant_id)
            ->groupBy('anno', 'mese')
            ->orderBy('anno', 'desc')
            ->get();

        $cash = $cash->filter(function ($val) {
            return $val['anno'] == 2024;
        });

        dd($year, $cash);
        // dd($month);
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
                    'data' =>  ''/* percentuale lable 1,  percentuale lable 1  */
                ]
            ])
            ->options([]);

        return view('admin.charts.index', compact('chartjs'));
    }
}
