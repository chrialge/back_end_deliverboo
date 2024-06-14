@extends('layouts.admin')

@section('content')
    <div class="container">

        <form class="form-control bg-light p-4" action="{{ route('admin.dishes.update', $dish) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <!-- Input for name-->
            <div class="mb-3">
                <label for="name" class="form-label">Dish name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="name" value="{{ old('name', $dish->name) }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for image-->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelper" placeholder="image"
                    value="{{ old('image', $dish->image) }}" />
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for price-->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    name="price" id="price" aria-describedby="priceHelper" placeholder="price"
                    value="{{ old('price', $dish->price) }}" />
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <!--Input for Visibility-->
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="radio" class="btn-check" name="visibility" id="visibility" autocomplete="off"
                    value="1" />
                <label class="btn btn-outline-primary" for="visibility">Visible</label>

                <input type="radio" class="btn-check" name="visibility" id="visibility" autocomplete="off"
                    value="0" />
                <label class="btn btn-outline-primary" for="visibility">Unvisible</label>
            </div>

            <!--Input for ingredients-->
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients</label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
                    rows="5">{{ old('ingredients', $dish->ingredients) }}</textarea>
            </div>


            <button class="btn btn-primary" type="submit">Add dish</button>

        </form>
    </div>
@endsection
