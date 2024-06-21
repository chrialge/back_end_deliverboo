@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('partials.session')

        <a href="{{ route('admin.restaurants.create') }}" class="btn btn primary">add</a>

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        {{-- <th scope="col">ID</th>
                        <th scope="col">User_id</th> --}}
                        <th scope="col">Nome</th>
                        {{-- <th scope="col">Slug</th> --}}
                        <th scope="col">Numero di telefono</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Partita IVA</th>
                        <th scope="col">Azioni</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($restaurants as $restaurant)
                        <tr class="">
                            {{-- <td scope="row">{{ $restaurant->id }}</td>
                            <td scope="row">{{ $restaurant->user_id }}</td> --}}
                            <td scope="row">{{ $restaurant->name }}</td>
                            {{--  <td scope="row">{{ $restaurant->slug }}</td> --}}
                            <td scope="row">{{ $restaurant->phone_number }}</td>
                            <td scope="row">
                                @if (Str::contains($restaurant->image, ['https://', 'http://']))
                                    <img width="140" src="{{ $restaurant->image }}"
                                        alt="Image of restaurant: {{ $restaurant->title }}">
                                @elseif (!empty($restaurant->image))
                                    <img width="140" src="{{ asset('storage/' . $restaurant->image) }}"
                                        alt="{{ $restaurant->title ? 'Image of restaurant: ' . $restaurant->title : "don't image of the project" }}">
                                @else
                                    <div width="140">Nothing to print</div>
                                @endif

                            </td>
                            <td scope="row">{{ $restaurant->address }}</td>
                            <td scope="row">{{ $restaurant->vat_number }}</td>
                            <td scope="row">

                                <a href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-dark">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>

                                {{-- <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a> --}}

                                {{-- modal for action delete --}}
                                <!-- Modal trigger button -->
                                {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $restaurant->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $restaurant->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $restaurant->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $restaurant->id }}">
                                                    Attention!!⚡⚡ Deleting: {{ $restaurant->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                You are about to dlete this record. This operation is
                                                DESCTRUCTIVE!💣💣💣
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.restaurants.destroy', $restaurant) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </td>

                        </tr>
                    @empty

                        <tr class="">
                            <td scope="row">Nessun ristorante da mostrare qua 😭😭😭😭😭</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>


    </div>
@endsection
