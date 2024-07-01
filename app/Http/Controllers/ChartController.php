<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;


class ChartController extends Controller
{
    public function index(Request $request)
    {
        // classe che prende la sata e ora odierna
        $date = new DateTime();
        // modifica la data odierna meno 12 mesi
        $dateMinus12 = $date->modify("-12 months");
        // formata la data simile a quella della colonna created_at
        $dateMinus12 = $dateMinus12->format('Y-m-d H:i:s');
        // dd($date, $dateMinus12);



        /* recupero lo user id */
        $user = Auth::id();
        /* recupero l'anno selezionato dal form della pagina index */
        $selectedYear = $request->input('year', 'lastmonths');
        /* recupero i ristoranti con dishes, types e orders*/
        $restaurant = Restaurant::with('dishes', 'types', 'orders')->where('user_id', $user)->get();
        /* recupero l'id del ristorante */
        $restaurant_id = $restaurant[0]['id'];

        if ($selectedYear == 'lastmonths') {
            // ordini degl'ultimi 12 mesi
            $orders = Order::selectRaw('year(created_at) anno, month(created_at) mese, count(*) ordini, sum(total_price) guadagno')
                ->whereDate('created_at', '>=', $dateMinus12)
                ->where('restaurant_id', $restaurant_id)
                ->where('status', '>', 0)
                ->groupBy('anno', 'mese')
                ->orderBy('anno', 'desc')
                ->get();
        } else {
            // ordini del anno selezionato
            $orders = Order::selectRaw('year(created_at) anno, month(created_at) mese, count(*) ordini, sum(total_price) guadagno')
                ->whereYear('created_at', $selectedYear)
                ->where('restaurant_id', $restaurant_id)
                ->where('status', '>', 0)
                ->groupBy('anno', 'mese')
                ->orderBy('anno', 'desc')
                ->get();
        }
        /* creo una variabie per poi calcolare il totale delle vendite annuale  */
        $totalYear = 0;
        /* creo un array per i 12 mesi dell'anno */
        $months = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
        /* creo un array dove racchiudo i numeri ordini di ogni mese */
        $numberOrder = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        // creao un array dove racchiude i profitti di ogni mese 
        $profits = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($orders as $order) {

            for ($i = 0; $i < count($months); $i++) {

                if ($i ==  0 && $order['mese'] == 1) {
                    $numberOrder[$i] = $order['ordini'];

                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 1 && $order['mese'] == 2) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 2 && $order['mese'] == 3) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 3 && $order['mese'] == 4) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 4 && $order['mese'] == 5) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 5 && $order['mese'] == 6) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 6 && $order['mese'] == 7) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 7 && $order['mese'] == 8) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 8 && $order['mese'] == 9) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 9 && $order['mese'] == 10) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 10 && $order['mese'] == 11) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                } else if ($i == 11 && $order['mese'] == 12) {
                    $numberOrder[$i] = $order['ordini'];
                    $profits[$i] = $order['guadagno'];
                    $totalYear += $order['guadagno'];
                }
            }
        }

        if ($selectedYear == 'lastmonths') {
            // creo il nuovo ordine che deve avere l'array 
            $b = array(7, 8, 9, 10, 11, 0, 1, 2, 3, 4, 5, 6,);
            // variabile dove racchiudo i profitti degl'ultimi 12 mesi
            $profitsLastMonths = [];
            // variabile dove racchiudo gl'ordini degl'ultimi 12 mesi
            $numberOrderLastMonths = [];
            // variabile dove racchiudo i mesi degl'ultimi 12 mesi
            $monthsLastMonths = []; // rule indicating new key order
            foreach ($b as $index) {
                // pusho nelle variabili
                array_push($monthsLastMonths, $months[$index]);
                array_push($numberOrderLastMonths, $numberOrder[$index]);
                array_push($profitsLastMonths, $profits[$index]);
            }
            // sovrascrive months
            $months = $monthsLastMonths;
            //sovrascrivo i profitti
            $profits = $profitsLastMonths;
            // sovrascrivo gl'ordini
            $numberOrder = $numberOrderLastMonths;
            // dd($monthsLastMonths, $numberOrder, $profits);
        }

        // grafico degl'ordini
        $chartjs = app()->chartjs
            ->name('orp$profitsini') /* Nome grafico */
            ->type('line') /* tipo di grafico */
            /* dimensioni */
            ->size(['width' => 400, 'height' => 200])
            ->labels($months) /* etichette */
            ->datasets([
                [
                    'label' => 'Ordini',
                    'backgroundColor' => ['#9AD0F5'],
                    'fill' => true,
                    'borderColor' => ['#36A2EB'], /* colore lable 1, colore lable 2 */
                    'data' => $numberOrder /* percentuale lable 1,  percentuale lable 1  */
                ],
            ])
            ->options([
                'responsive' => false,
                "pointBackgroundColor" => '#fff',
                "radius" => 7,
                "width" => '100%'

            ]);

        // grafico profitti
        $chartprofits = app()->chartjs
            ->name('profitti')
            ->type('pie')/* dimensioni */
            ->labels($months)
            ->datasets([
                [
                    'label' => 'Profitti',
                    'backgroundColor' => ['#4e7d84', '#f918e8', '#01610c', '#594b56', '#072ff6', '#1d2fc6', '#71f45b', '#5be5dc', '#4cf456', '#510008', '#65339e', '#b5268b'], /* colore lable 1, colore lable 2 */
                    'data' => $profits /* percentuale lable 1,  percentuale lable 1  */
                ]
            ])
            ->options([
                'responsive' => true,
            ]);




        return view('admin.charts.index', compact('chartjs', 'chartprofits', 'selectedYear', 'totalYear'));
    }
}
