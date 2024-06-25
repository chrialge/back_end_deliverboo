@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between pb-3">
            <h1>Piatti</h1>
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
                Aggiungi Piatto
            </a>
        </div>

        @include('partials.session')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        {{-- <th scope="col">id</th> --}}
                        <th scope="col" class="bg-dark text-white py-3">Nome</th>
                        {{-- <th scope="col">slug</th> --}}
                        <th scope="col" class="bg-dark text-white py-3">Immagine</th>
                        {{-- <th scope="col">Ingredienti</th> --}}
                        <th scope="col" class="bg-dark text-white py-3">Prezzo</th>
                        <th scope="col" class="bg-dark text-white py-3">Visibile</th>
                        <th scope="col" class="bg-dark text-white py-3">Azioni</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($dishes as $dish)
                        <tr class="">
                            {{-- <td>{{ $dish->id }}</td> --}}
                            <td scope="row">{{ $dish->name }}</td>
                            {{-- <td scope="row">{{ $dish->slug }}</td> --}}
                            <td>
                                @if (Str::contains($dish->image, ['https://', 'http://']))
                                    <img width="140" src="{{ $dish->image }}" alt="Image of dish: {{ $dish->title }}">
                                @else
                                    <img width="140" src="{{ asset('storage/' . $dish->image) }}"
                                        alt="{{ $dish->title ? "Image of dish: $dish->title" : "don't image of the dish" }}">
                                @endif
                            </td>
                            {{-- <td>{{ $dish->ingredients }}</td> --}}
                            <td>{{ $dish->price }}</td>
                            <td>{{ $dish->visibility == 1 ? 'Si' : 'No' }}</td>
                            <td scope="row d-flex gap-2 flex-wrap">

                                <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-dark mb-1">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>

                                <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning mb-1">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                {{-- modal for action delete --}}
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $dish->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $dish->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $dish->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $dish->id }}">
                                                    Attenzione!!⚡⚡ Cancellerai: {{ $dish->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Stai per cancellare questo dato. Questa operazione sarà
                                                DISTRUTTIVA E IRRECUPERABILE!💣💣💣
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Chiudi
                                                </button>
                                                <form action="{{ route('admin.dishes.destroy', $dish) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty

                        <tr class="">
                            <td>Nessun piatto disponibile! 😭😭😭😭😭</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{ $dishes->links('pagination::bootstrap-5') }}

    </div>
@endsection
