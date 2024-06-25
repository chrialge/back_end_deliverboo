<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Requests\Admin\Order\StoreOrderRequest;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Mail\OrderShippedMd;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Braintree\Gateway;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(8);
        return view('admin.orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // controlla i dati mandati dal form
        $val_data = $request->all();

/*         return response()->json([
            'success' => true,
            'data' => $val_data
        ]); */

        $validator = Validator::make($val_data, [
            'restaurant_id' => 'required|integer',
            'customer_name' => 'required|min:3',
            'customer_lastname' => 'required|min:3',
            'customer_address' => 'required|min:6',
            'customer_phone_number' => 'required|integer',
            'customer_email' => 'required|email',
            'customer_note' => 'nullable|',
            'total_price' => 'required|numeric',
            'cartItems' => 'nullable',
        ]);



        //in caso si fallisce un campo si rimanda indietro la lista di errori
        if ($validator->fails()) {
            return response()->json([
                'errors' => true,
                'errors' => $validator->errors(),
            ]);
        }

        // si rachhiude il check di tutte gli ordini con lo stesso nome e cognome per il consumatore
        $slug_checker = Order::where('customer_name', $val_data['customer_name'])->where(
            'customer_lastname',
            $val_data['customer_lastname']
        )->count();

        // se ci sono corrispondenze si crea uno slug uunivoco
        if ($slug_checker) {
            $slug = $val_data['customer_name'] . $val_data['customer_lastname'] . '-' . $slug_checker + 1;
        } else {
            $slug = $val_data['customer_name'] . $val_data['customer_lastname'];
        }
        $val_data['slug'] = $slug;

        //***********  PAGAMENTO *****************
        //Se la validazione va a buon fine gestisco il pagamento

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        //Assegno alla mia variabile l'input che mi arriva lato client nella mia request di Laravel
        $clientNonce = $request->input('paymentMethodNonce');

        //Creo un array associativo seguendo la struttua di BrainTree per la mia transazione
        //Utilizzo il metodo transaction di Gateway per accedere ai dati e sale per effettuare una transazione
        $total_price = $val_data['total_price'];
        $newTransaction = $gateway->transaction()->sale([
            'amount' => $total_price,
            'paymentMethodNonce' => $clientNonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        //Fine pagamento 

        //Se la transazione fa a buon fine
        if ($newTransaction->success) {

            // creo un nuovo ordine

            $order = Order::create($val_data);

            // inserisco nella tabella pivot i dati della correlazione order e piatti
            foreach ($val_data['cartItems'] as $dish) {
                //dd($dish); // Controlla i dati qui
                $order->dishes()->attach($dish['object']['id'], [
                    'quantity' => $dish['quantity'],
                    'price_per_unit' => $dish['object']['price'],
                ]);
            }

        Mail::to($val_data['customer_email'])->send(new OrderShippedMd($order));
        // Mail::to('chrialge99@gmail.com')->send(new OrderShippedMd($order));
        // in caso i dati hanno la giusta validazione mando un messaggio di successo
        return response()->json([
            'success' => true,
            'message' => 'ha avuto successo il pagamento'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //dd($order);
        /*         if (Gate::allows('order-checker', $order)) {
         */
        return view('admin.orders.show', compact('order'));
        /*         }
                abort(403, "Don't try to enter into another order"); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
