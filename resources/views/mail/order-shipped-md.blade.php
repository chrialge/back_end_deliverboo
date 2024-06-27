<x-mail::message>
    # Deliveboo
    Salve, grazie per aver fatto l'ordine Sign. {{ $order->customer_name }} {{ $order->customer_lastname }}

    giorno e ora: {{ $order->created_at }}

    @foreach ($order->dishes as $dish)
        {{ $dish->name }} - Quantità: {{ $dish->pivot->quantity }}
        Prezzo per unità: {{ $dish->pivot->price_per_unit }} €
    @endforeach


    Totale Pagamento : {{ number_format($order->total_price, 2, '.', '') }} €


    Grazie da {{ config('app.name') }}

</x-mail::message>
