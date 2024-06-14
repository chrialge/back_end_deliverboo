@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1>All Dishes</h1>
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
                Add dish
            </a>
        </div>

        @include('partials.session')

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">slug</th>
                        <th scope="col">image</th>
                        <th scope="col">ingredients</th>
                        <th scope="col">price</th>
                        <th scope="col">visibility</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($dishes as $dish)
                        <tr class="">
                            <td scope="row">{{ $dish->id }}</td>
                            <td scope="row">{{ $dish->name }}</td>
                            <td scope="row">{{ $dish->slug }}</td>
                            <td scope="row">
                                @if (Str::contains($dish->image, ['https://', 'http://']))
                                    <img width="140" src="{{ $dish->image }}" alt="Image of dish: {{ $dish->title }}">
                                @else
                                    <img width="140" src="{{ asset('storage/' . $dish->image) }}"
                                        alt="{{ $dish->title ? "Image of dish: $dish->title" : "don't image of the project" }}">
                                @endif
                            </td>
                            <td scope="row">{{ $dish->ingredients }}</td>
                            <td scope="row">{{ $dish->price }}</td>
                            <td scope="row">{{ $dish->visibility }}</td>
                            <td scope="row">

                                <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-dark">
                                    view
                                </a>

                                <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-dark">
                                    edit
                                </a>

                                {{-- modal for action delete --}}
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $dish->id }}">
                                    Delete
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
                                                    Attention!!⚡⚡ Deleting: {{ $dish->name }}
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
                            <td scope="row">Sorry i don't have collection 😭😭😭😭😭</td>

                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>


    </div>
@endsection
