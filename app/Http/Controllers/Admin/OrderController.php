<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Requests\Admin\Order\StoreOrderRequest;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
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
            $slug =  $val_data['customer_name'] . $val_data['customer_lastname'] . '-' . $slug_checker + 1;
        } else {
            $slug =  $val_data['customer_name'] . $val_data['customer_lastname'];
        }
        $val_data['slug'] = $slug;

        // creo un nuovo ordine
        $order =  Order::create($val_data);

        // inserisco nella tabella pivot i dati della correlazione order e piatti
        foreach ($val_data['cartItems'] as $dish) {
            //dd($dish); // Controlla i dati qui
            $order->dishes()->attach($dish['object']['id'], [
                'quantity' => $dish['quantity'],
                'price_per_unit' => $dish['object']['price'],
            ]);
        }

        // in caso i dati hanno la giusta validazione mando un messaggio di successo
        return response()->json([
            'success' => true,
            'message' => 'puoi procedere al pagamento'
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
