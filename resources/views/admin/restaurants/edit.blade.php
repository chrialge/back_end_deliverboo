@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        <div class="d-flex align-items-center justify-content-between">
            <h1>All Restaurants</h1>
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-dark">
                return to restaurants
            </a>
        </div>

        @include('partials.validate')

        <form class="form-control bg-light p-4" action="{{ route('admin.restaurants.update', $restaurant) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <!-- Input for name-->
            <div class="mb-3">
                <label for="name" class="form-label">Restaurant name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="name" value="{{ old('name', $restaurant->name) }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for phone number -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone number</label>
                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                    id="phone_number" aria-describedby="phone_numberHelper" placeholder="phone_number"
                    value="{{ old('phone_number', $restaurant->phone_number) }}" />
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for image-->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelper" placeholder="image"
                    value="{{ old('image', $restaurant->image) }}" />
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for address-->
            <div class="mb-3">
                <label for="address" class="form-label">Restaurant address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    id="address" aria-describedby="addressHelper" placeholder="address"
                    value="{{ old('address', $restaurant->address) }}" />
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for VAT number-->
            <div class="mb-3">
                <label for="vat_number" class="form-label">Restaurant vat_number</label>
                <input type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                    id="vat_number" aria-describedby="vat_numberHelper" placeholder="vat_number"
                    value="{{ old('vat_number', $restaurant->vat_number) }}" />
                @error('vat_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-warning" type="submit">Add dish</button>

        </form>
    </div>
@endsection
