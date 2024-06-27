<x-mail::message>
    # {{ $restaurant->name }}
    Ordine : #{{ $order->id }}

    Giorno e Ora: {{ $order->created_at }}

    Piatti:
    @foreach ($order->dishes as $dish)
        {{ $dish->name }} - Quantità: {{ $dish->pivot->quantity }}
    @endforeach

    Totale Pagamento : {{ number_format($order->total_price, 2, '.', '') }} €

    Grazie, da {{ config('app.name') }}

</x-mail::message>
