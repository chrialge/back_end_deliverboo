<x-mail::message>
    # Mail for user
    Salve, grazie per aver fatto l'ordine Sign. {{ $user->name }} {{ $user->lastname }}

    Ordine:

    giorno e ora: {{ $order->created_at }}

    @foreach ($order->dishes as $dish)
        {{ $dish->name }} - Quantità: {{ $dish->pivot->quantity }}
        Prezzo per unità: €{{ $dish->pivot->price_per_unit }}
    @endforeach

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
