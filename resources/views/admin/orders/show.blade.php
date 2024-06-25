@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="header d-flex align-items-center justify-content-between">
            <div class="left_header">
                <h1 class="primary_text">Order ID: {{ $order->id }}</h1>
            </div>

            <a href="{{ route('admin.orders.index') }}" class="btn text-light" style="background-color: #8e79f8;">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </div>

        <div class="metdadata py-5">

            <div class="price d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Nome Acquirente:
                </h4>
                <span>{{ $order->customer_name }}</span>
            </div>

            <div class="price d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Cognome Acquirente:
                </h4>
                <span>{{ $order->customer_lastname }}</span>
            </div>

            <div class="price d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Indirzzo Acquirente:
                </h4>
                <span>{{ $order->customer_address }}</span>
            </div>
            <div class="price d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Totale ordine:
                </h4>
                <span>{{ $order->total_price }} $</span>
            </div>
            <div class="price d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Piatti ordinati:
                </h4>
                <ul>
                    @foreach ($order->dishes as $dish)
                        <li>{{ $dish->name }} - Quantità: {{ $dish->pivot->quantity }} - Prezzo per unità:
                            €{{ $dish->pivot->price_per_unit }}</li>
                    @endforeach{{--  {{ dd($dish) }} --}}
                </ul>



            </div>

        </div>
    </div>
@endsection
