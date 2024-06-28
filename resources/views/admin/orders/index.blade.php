@extends('layouts.admin')

@section('content')
    <div class="container">
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
                        <th scope="col" class="bg-dark text-white py-3">Azioni</th>
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



                            {{-- <td>{{ $order->customer_address }}</td>
                            <td>{{ $order->customer_phone_number }}</td>
                            <td>{{ $order->slug }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ $order->customer_note }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->status }}</td>  --}}
                            <td scope="row d-flex gap-2 flex-wrap">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-dark">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @empty

                        <tr class="">
                            <td colspan="4">Non hai ancora ricevuto nessun ordine! </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

      {{--  {{ $orders->links('pagination::bootstrap-5') }} --}}
    </div>
@endsection
