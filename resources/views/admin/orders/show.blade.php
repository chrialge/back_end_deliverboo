@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="header d-flex align-items-center justify-content-between">
            <div class="left_header">
            </div>

            <a href="{{ url()->previous() }}" class="btn text-light" style="background-color: #8e79f8;">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Torna agli ordini
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 my-5">

                <h3>Dettagli Ordine</h3>

                @foreach ($dateTime = explode(' ', $order->created_at) as $tim)
                    @if ($loop->index == 0)
                        <div class="price d-flex align-items-center flex-wrap my-1">
                            <div class="primary_text">
                                Data
                            </div>
                            <span>{{ $dateTime[0] }}</span>
                        </div>
                        <!-- /data -->
                    @endif

                    @if ($loop->index == 1)
                        <div class="price d-flex align-items-center flex-wrap my-1">
                            <div class="primary_text">
                                Ora
                            </div>
                            <span>{{ $time = substr($dateTime[1], 0, -3) }}</span>
                        </div>
                        <!-- /ora -->
                    @endif
                @endforeach

                <div class="price d-flex align-items-center my-2">
                    <div class="primary_text">
                        Totale ordine:
                    </div>
                    <span>{{ $order->total_price }} &euro;</span>
                </div>
                <!-- /tot order -->

                <div class="price">
                    <div class="primary_text">
                        Piatti ordinati:
                    </div>
                    <ul class="list-unstyled mb-0">
                        @foreach ($order->dishes as $dish)
                            <li>{{ $dish->name }} - Quantità: {{ $dish->pivot->quantity }} - Prezzo per unità:
                                €{{ $dish->pivot->price_per_unit }}</li>
                        @endforeach
                    </ul>
                </div>
                <!-- /ordine -->

                <div class="price d-flex align-items-center flex-wrap my-2">
                    <div class="primary_text">
                        Note del Cliente:
                    </div>
                    <span>{{ $order->customer_note }}</span>
                </div>
                <!-- /notes -->

            </div>
            <!-- /.col -->
            <div class="col-12 col-lg-6 my-5">

                <h3> Dettagli cliente</h3>

                <div class="price d-flex align-items-center flex-wrap my-2">
                    <div class="primary_text">
                        Nome Cliente:
                    </div>
                    <span> {{ $order->customer_name }}</span>
                </div>
                <!-- /name -->

                <div class="price d-flex align-items-center flex-wrap my-2">
                    <div class="primary_text">
                        Cognome Cliente:
                    </div>
                    <span> {{ $order->customer_lastname }}</span>
                </div>
                <!-- /surname -->

                <div class="price d-flex align-items-center flex-wrap my-2">
                    <div class="primary_text">
                        Indirzzo Cliente:
                    </div>
                    <span>{{ $order->customer_address }}</span>
                </div>
                <!-- /adress -->

                <div class="price d-flex align-items-center flex-wrap my-2">
                    <div class="primary_text">
                        Numero Telefonico Cliente:
                    </div>
                    <span>{{ $order->customer_phone_number }}</span>
                </div>
                <!-- /phone number -->

                <div class="price d-flex align-items-center flex-wrap my-2">
                    <div class="primary_text">
                        Email Cliente:
                    </div>
                    <span>{{ $order->customer_email }}</span>
                </div>
                <!-- /email -->

            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->

    </div>
@endsection
