@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="header d-flex align-items-center justify-content-between">
            <div class="left_header">
                <h1 class="primary_text">Restaurant: {{ $restaurant->name }}</h1>
                <span>{{ $restaurant->slug }}</span>
            </div>

            <a href="{{ route('admin.restaurants.index') }}" class="btn text-light" style="background-color: #8e79f8;">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </div>

        <div class="metdadata py-5">

            <div class="number_phone d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Phone Number:
                </h4>
                <span>{{ $restaurant->phone_number }}</span>
            </div>

            <div class="address d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    VAT number
                </h4>
                <span>{{ $restaurant->vat_number }}</span>
            </div>

            <div class="address d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Address:
                </h4>
                <span>{{ $restaurant->address }}</span>
            </div>

            <div class="image_restaurant">
                @if (Str::contains($restaurant->image, ['https://', 'http://']))
                    <img width="100%" src="{{ $restaurant->image }}" alt="Image of restaurant: {{ $restaurant->title }}">
                @else
                    <img width="100% src="{{ asset('storage/' . $restaurant->image) }}"
                        alt="{{ $restaurant->title ? "Image of restaurant: $restaurant->title" : 'Image not available' }}">
                @endif
            </div>

            <ul>
                @foreach ($restaurant->types as $type)
                    <li>{{ $type->name }}</li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
