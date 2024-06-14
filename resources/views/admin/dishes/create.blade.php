@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="d-flex align-items-center justify-content-between">
            <h1>All Dishes</h1>
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-dark">
                return dishes
            </a>
        </div>

        @include('partials.validate')

        <form class="form-control bg-light p-4" action="{{ route('admin.dishes.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <!-- Input for name-->
            <div class="mb-3">
                <label for="name" class="form-label">Dish name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="name" value="{{ old('name') }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for image-->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelper" placeholder="image" value="{{ old('image') }}" />
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for price-->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    name="price" id="price" aria-describedby="priceHelper" placeholder="price"
                    value="{{ old('price') }}" />
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <!--Input for Visibility-->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="visibility-1" name="visibility"
                    {{ old('visibility') == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="visibility-1">
                    Visible
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="0" id="visibility-2" name="visibility"
                    {{ old('visibility') == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="visibility-2">
                    Unvisible
                </label>
            </div>


            <!--Input for ingredients-->
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients</label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
                    rows="5">{{ old('ingredients') }}</textarea>
            </div>


            <button class="btn btn-primary" type="submit">Add dish</button>

        </form>
    </div>
@endsection
