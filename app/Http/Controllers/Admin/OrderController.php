<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Requests\Admin\Order\StoreOrderRequest;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.orders.index', ['orders' => Order::all()]);
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
    public function store(StoreOrderRequest $request)
    {

        $val_data = $request->validated();
        $prova = $val_data['customer_name'];
        //$order =  Order::create($val_data);

        //$infoCustomer = $request->input();
        //dd($val_data);
        //Creo un array di default per i tentativi
        /*$infoCustomer = [
            'restaurant_id' => 2,
            'customer_name' => 'Ciro',
            'customer_last_name' => 'Marongiu',
            'customer_address' => 'Via Alghero 9',
            'customer_phone_number' => '327454545',
            'customer_email' => 'giacomo@example.it',
            'customer_note' => 'Ben cotta',
            'total_price' => 22.22 ,
            'order_status' => 1,
        ]; */
        //dd($infoCustomer);

        //Arrai di default che ipotizza un carrello
/*         $cartItems = [
            [
                'object' => ['id' => 4],
                'quantity' => 2,
                'price_per_unit' => 22.30
            ],
            [
                'object' => ['id' => 1],
                'quantity' => 3,
                'price_per_unit' => 44.00
            ]
        ]; */

        //Creo un istanza order per popolare la tabella con i dati che mi sono stati inviati
        $newOrder = new Order();
        $newOrder->restaurant_id = $val_data['restaurant_id'];
        $newOrder->slug = "diocane";
        $newOrder->customer_name = $val_data['customer_name'];
        $newOrder->customer_lastname = $val_data['customer_lastname'];
        $newOrder->customer_address = $val_data['customer_address'];
        $newOrder->customer_phone_number = $val_data['customer_phone_number'];
        $newOrder->customer_email = $val_data['customer_email'];
        $newOrder->customer_note = $val_data['customer_note'];
        $newOrder->total_price = $val_data['total_price'];
        $newOrder->status =1;
        $newOrder->save(); 


       /* foreach ($cartItems as $dish) {
            //dd($dish); // Controlla i dati qui
            $newOrder->dishes()->attach($dish['object']['id'], [
                'quantity' => $dish['quantity'],
                'price_per_unit' => $dish['price_per_unit']
            ]);
        }  */
        //dd($newOrder->dishes);
        //return view('admin.orders.index', compact('val_data'));


         return response()->json([
            'success' => true,
            'data' => $val_data
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
