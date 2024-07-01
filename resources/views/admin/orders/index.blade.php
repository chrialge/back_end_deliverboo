@extends('layouts.admin')

@section('content')
    <div class="container p-0 p-sm-2">
        <div class="d-flex align-items-center justify-content-between pb-3">
            <h1>Ordini</h1>
        </div>

        @include('partials.session')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-dark">
                    <tr class="">
                        <th scope="col" class="bg-dark text-white py-3">Cliente</th>
                        <th scope="col" class="bg-dark text-white py-3">Data</th>
                        <th scope="col" class="bg-dark text-white py-3">Ora</th>
                        {{-- <th scope="col" class="bg-dark text-white py-3">Indirizzo</th>
                        <th scope="col" class="bg-dark text-white py-3">Telefono</th> --}}
                        <th scope="col" class="bg-dark text-white py-3 text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="">
                            {{-- <td scope="row">{{ $order->id }}</td> --}}
                            <td scope="row">{{ $order->customer_name }} {{ $order->customer_lastname }}</td>
                            @foreach ($dateTime = explode(' ', $order->created_at) as $tim)
                                @if ($loop->index == 0)
                                    <td>{{ $dateTime[0] }}</td>
                                @endif

                                @if ($loop->index == 1)
                                    <td>{{ $time = substr($dateTime[1], 0, -3) }}</td>
                                @endif
                            @endforeach
                            <td scope="row" class="text-end">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-dark">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @empty

                        <tr class="">
                            <td scope="row">Non c'è stato ancora nessun ordine!</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection
