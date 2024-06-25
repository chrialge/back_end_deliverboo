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

            <div class="price d-flex align-items-center flex-wrap gap-2">
                <h4 class="primary_text">
                    Nome Cliente:
                </h4>
                <span>{{ $order->customer_name }}</span>
            </div>

            @foreach ($dateTime = explode(' ', $order->created_at) as $tim)
                @if ($loop->index == 0)
                    <div class="price d-flex align-items-center flex-wrap gap-1">
                        <h4 class="primary_text">
                            Data
                        </h4>
                        <span>{{ $dateTime[0] }}</span>
                    </div>
                @endif

                @if ($loop->index == 1)
                    <div class="price d-flex align-items-center flex-wrap gap-1">
                        <h4 class="primary_text">
                            Ora
                        </h4>
                        <span>{{ $time = substr($dateTime[1], 0, -3) }}</span>
                    </div>
                @endif
            @endforeach
            <div class="price d-flex align-items-center flex-wrap gap-1">
                <h4 class="primary_text">
                    Cognome Cliente:
                </h4>
                <span>{{ $order->customer_lastname }}</span>
            </div>

            <div class="price d-flex align-items-center  flex-wrap gap-2">
                <h4 class="primary_text">
                    Indirzzo Cliente:
                </h4>
                <span>{{ $order->customer_address }}</span>
            </div>


            <div class="price d-flex align-items-center  flex-wrap gap-2">
                <h4 class="primary_text">
                    Numero Cliente:
                </h4>
                <span>{{ $order->customer_phone_number }}</span>
            </div>

            <div class="price d-flex align-items-center  flex-wrap gap-2">
                <h4 class="primary_text">
                    Email Cliente:
                </h4>
                <span>{{ $order->customer_email }}</span>
            </div>

            <div class="price d-flex flex-column gap-2">
                <h4 class="primary_text">
                    Note del Cliente:
                </h4>
                <p>{{ $order->customer_note }}</p>
            </div>

            <div class="price d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Totale ordine:
                </h4>
                <span>{{ $order->total_price }} &euro;</span>
            </div>
            <div class="price">
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
