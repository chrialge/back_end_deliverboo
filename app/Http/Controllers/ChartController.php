<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

        /* recupero l'id del ristorante */
        $restaurant_id = $restaurant[0]['id'];
        /* recupero gli ordini */
        $orders = Order::selectRaw('year(created_at) anno, month(created_at) mese, count(*) ordini, sum(total_price) guadagno')
            ->whereYear('created_at', $selectedYear)
            ->where('restaurant_id', $restaurant_id)
            ->where('status', '>', 0)
            ->groupBy('anno', 'mese')
            ->orderBy('anno', 'desc')
            ->get();
        /* creo una variabie per poi calcolare il totale delle vendite annuale  */
        $totalYear = 0;
        /* creo un array per i 12 mosi dell'anno */
        $months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        // creao un array dove racchiude i profitti di ogni mese dell'anno selezionato
        $profits = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($orders as $order) {

            for ($i = 0; $i < count($months); $i++) {

                if ($i ==  0 && $order['mese'] == 1) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 1 && $order['mese'] == 2) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 2 && $order['mese'] == 3) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 3 && $order['mese'] == 4) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 4 && $order['mese'] == 5) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 5 && $order['mese'] == 6) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 6 && $order['mese'] == 7) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 7 && $order['mese'] == 8) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 8 && $order['mese'] == 9) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 9 && $order['mese'] == 10) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 10 && $order['mese'] == 11) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 11 && $order['mese'] == 12) {
                    $months[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                }
            }
        }

        $chartjs = app()->chartjs
            ->name('ordini') /* Nome grafico */
            ->type('bar') /* tipo di grafico */
            ->size(['width' => 50, 'height' => 30]) /* dimensioni */
            ->labels(['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre']) /* etichette */
            ->datasets([
                [
                    'label' => 'Ordini',
                    'backgroundColor' => ['#4e7d84', '#f918e8', '#01610c', '#594b56', '#072ff6', '#1d2fc6', '#71f45b', '#5be5dc', '#4cf456', '#510008', '#65339e', '#b5268b'], /* colore lable 1, colore lable 2 */
                    'data' => $months /* percentuale lable 1,  percentuale lable 1  */
                ],
            ])
            ->options([]);

        $chartprofits = app()->chartjs
            ->name('profitti')
            ->type('pie')
            ->size(['width' => 50, 'height' => 30]) /* dimensioni */
            ->labels(['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'])
            ->datasets([
                [
                    'label' => 'Profitti',
                    'backgroundColor' => ['#4e7d84', '#f918e8', '#01610c', '#594b56', '#072ff6', '#1d2fc6', '#71f45b', '#5be5dc', '#4cf456', '#510008', '#65339e', '#b5268b'], /* colore lable 1, colore lable 2 */
                    'data' => $profits /* percentuale lable 1,  percentuale lable 1  */
                ]
            ])
            ->options([]);




        return view('admin.charts.index', compact('chartjs', 'chartprofits', 'selectedYear', 'totalYear'));

    }
}
