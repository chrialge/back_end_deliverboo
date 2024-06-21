@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1>Piatti</h1>
        </div>

        @include('partials.session')

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome Acquirente</th>
                        <th scope="col">Cognome Acquirente</th>
                        <th scope="col">slug</th>
                        <th scope="col">Indirizzo Ordine</th>
                        <th scope="col">Numero di telefono</th>
                        <th scope="col">Email Acquirente</th>
                        <th scope="col">Note</th>
                        <th scope="col">Prezzo totale</th>
                        <th scope="col">Status ordine</th>
                        <th scope="col">Azioni</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="">
                            <td scope="row">{{ $order->id }}</td>
                            <td scope="row">{{ $order->customer_name }}</td>
                            <td scope="row">{{ $order->customer_lastname }}</td>
                            <td scope="row">{{ $order->slug }}</td>
                            <td scope="row">{{ $order->customer_address }}</td>
                            <td scope="row">{{ $order->customer_phone_number }}</td>
                            <td scope="row">{{ $order->customer_email }}</td>
                            <td scope="row">{{ $order->customer_note }}</td>
                            <td scope="row">{{ $order->total_price }}</td>
                            <td scope="row">{{ $order->status }}</td>

                            <td scope="row d-flex gap-2 flex-wrap">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-dark">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @empty

                        <tr class="">
                            <td scope="row">Nessun ordine! 😭😭😭😭😭</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>


    </div>
@endsection
