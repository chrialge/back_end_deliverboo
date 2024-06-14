@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1>All restaurants</h1>
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">
                Add restaurant
            </a>
        </div>

        @include('partials.session')

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User_id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Phone_number</th>
                        <th scope="col">Image</th>
                        <th scope="col">Address</th>
                        <th scope="col">VAT number</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($restaurants as $restaurant)
                        <tr class="">
                            <td scope="row">{{ $restaurant->id }}</td>
                            <td scope="row">{{ $restaurant->user_id }}</td>
                            <td scope="row">{{ $restaurant->name }}</td>
                            <td scope="row">{{ $restaurant->slug }}</td>
                            <td scope="row">{{ $restaurant->phone_number }}</td>
                            <td scope="row">{{ $restaurant->image }}</td>
                            <td scope="row">{{ $restaurant->address }}</td>
                            <td scope="row">{{ $restaurant->vat_number }}</td>
                            <td scope="row">

                                <a href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-dark">
                                    view
                                </a>

                                <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-dark">
                                    edit
                                </a>

                                {{-- modal for action delete --}}
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $restaurant->id }}">
                                    Delete
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
