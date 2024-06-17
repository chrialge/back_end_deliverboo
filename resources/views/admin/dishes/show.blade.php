@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="header d-flex align-items-center justify-content-between">
            <div class="left_header">
                <h1 class="primary_text">Dish: {{ $dish->name }}</h1>
                <span>{{ $dish->slug }}</span>
            </div>

            <a href="{{ route('admin.dishes.index') }}" class="btn text-light" style="background-color: #8e79f8;">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </div>

        <div class="metdadata py-5">

            <div class="price d-flex align-items-center gap-2">
                <h4 class="primary_text">
                    Price:
                </h4>
                <span>{{ $dish->price }}</span>
            </div>

            <div class="visibility d-flex gap-2">

                <h4 class="primary_text">
                    Visibility:
                </h4>
                <span>{{ $dish->visibility == 0 ? 'Yes' : 'No' }}</span>


            </div>

            <div class="image_restaurant">
                @if (Str::contains($dish->image, ['https://', 'http://']))
                    <img width="100%" src="{{ $dish->image }}" alt="Image of dish: {{ $dish->title }}">
                @else
                    <img width="100% src="{{ asset('storage/' . $dish->image) }}"
                        alt="{{ $dish->title ? "Image of dish: $dish->title" : 'Image not available' }}">
                @endif
            </div>
            <div class="ingredients  py-4">
                <h4 class="primary_text">
                    Ingredients:
                </h4>
                <span>{{ $dish->ingredients }}</span>
            </div>

        </div>
    </div>
@endsection
