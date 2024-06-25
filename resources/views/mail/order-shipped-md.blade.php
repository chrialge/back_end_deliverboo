<x-mail::message>
    # Introduction
    Salve, grazie per aver fatto l'ordine Sign. {{ $order->customer_name }} {{ $order->customer_lastname }}

    The body of your message.
    giorno e ora: {{ $order->created_at }}

    @foreach ($order->dishes as $dish)
        {{ $dish->name }} - Quantità: {{ $dish->pivot->quantity }}
        Prezzo per unità: €{{ $dish->pivot->price_per_unit }}
    @endforeach



    Thanks
    {{ config('app.name') }}
</x-mail::message>
