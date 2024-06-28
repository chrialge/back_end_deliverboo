@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="header d-flex align-items-center justify-content-between">
            <div class="left_header">
                <h1 class="primary_text">Piatto: {{ $dish->name }}</h1>
            </div>

            <a href="{{ url()->previous() }}" class="btn text-light" style="background-color: #8e79f8;">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="metdadata py-5">
                    <div class="image_restaurant">
                        @if (Str::contains($dish->image, ['https://', 'http://']))
                            <img width="100%" src="{{ $dish->image }}" alt="Image of dish: {{ $dish->title }}">
                        @elseif (Str::contains($dish->image, 'img'))
                            <img width="100%" src="{{ url($dish->image) }}"
                                alt="{{ $dish->title ? "Image of dish: $dish->title" : 'Image not available' }}">
                        @else
                            <img width="100%" src="{{ asset('storage/' . $dish->image) }}"
                                alt="{{ $dish->title ? "Image of dish: $dish->title" : 'Image not available' }}">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6 py-5">
                <div class="price d-flex align-items-center gap-2">
                    <p class="primary_text">
                        Prezzo:
                    </p>
                    <span class="mb-3">{{ $dish->price }}</span>
                </div>

                <div class="visibility d-flex align-items-center gap-2">
                    <p class="primary_text">
                        Visibile:
                    </p>
                    <span class="mb-3">{{ $dish->visibility == 1 ? 'Sì' : 'No' }}</span>
                </div>

                <div class="ingredients d-flex align-items-center gap-2">
                    <p class="primary_text">
                        Ingredienti:
                    </p>
                    <span class="mb-3">{{ $dish->ingredients }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
