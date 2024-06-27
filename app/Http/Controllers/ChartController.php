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
        /* recupero lo user id */
        $user = Auth::id();
        /* recupero l'anno selezionato dal form della pagina index */
        $selectedYear = $request->input('year', 2024);
        /* recupero i ristoranti con dishes, types e orders*/
        $restaurant = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get();
        /* recupero gli ordini */
        $orders = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get()->pluck('orders')->flatten();
        /* creo una variabie per poi calcolare il totale delle vendite annuale  */
        $totalMonthlySales = 0;
        $totalSales = 0;
        /* creo un array per i 12 mosi dell'anno */
        $months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($orders as $order) {

            for ($i = 0; $i < count($months); $i++) {
                $totalSales = $totalSales + intval($order->total_price);
                if (intval($order->created_at->format('Y')) == $selectedYear) {
                    $totalMonthlySales = $totalMonthlySales + intval($order->total_price);
                    if (intval($order->created_at->format('m')) == $i + 1) {
                        $months[$i]++;
                    }
                }
            }
        }

        $chartjs = app()->chartjs
            ->name('pieChartTest') /* Nome grafico */
            ->type('bar') /* tipo di grafico */
            ->size(['width' => 50, 'height' => 30]) /* dimensioni */
            ->labels(['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre']) /* etichette */
            ->datasets([
                [
                    'label' => 'Ordini',
                    'backgroundColor' => ['#4e7d84', '#f918e8', '#01610c', '#594b56', '#072ff6', '#1d2fc6', '#71f45b', '#5be5dc', '#4cf456', '#510008', '#65339e', '#b5268b'], /* colore lable 1, colore lable 2 */
                    'data' => $months /* percentuale lable 1,  percentuale lable 1  */
                ]
            ])
            ->options([]);

        return view('admin.charts.index', compact('chartjs', 'selectedYear', 'totalMonthlySales', 'totalSales'));
    }
}
