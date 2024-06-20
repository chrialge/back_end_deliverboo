@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        <div class="d-flex align-items-center justify-content-between">
            <h1>Modifica Piatto</h1>
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-dark">
                Torna ai piatti
            </a>
        </div>
        <div class="text-secondary pb-4">* campo obbligatorio</div>

        @include('partials.validate')

        <form class="form-control bg-light p-4" action="{{ route('admin.dishes.update', $dish) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <!-- Input for name-->
            <div class="mb-3">
                <label for="name" class="form-label">
                    Nome <span class="text-secondary">*</span>
                </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="name" value="{{ old('name', $dish->name) }}" required />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for image-->
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelper" placeholder="image"
                    value="{{ old('image', $dish->image) }}" />
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for price-->
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo <span class="text-secondary">*</span></label>
                <input type="number" step="0.01" min="0.00"
                    class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                    aria-describedby="priceHelper" placeholder="price" value="{{ old('price', $dish->price) }}" required />
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!--Input for Visibility-->
            <div class="mb-3">
                <label for="visibility" class="form-label">Visibile <span class="text-secondary">*</span></label>
                <div class="form-check">
                    <input name="visibility" class="form-check-input" type="checkbox" value="0" id="visibility-0"
                        {{ old('visibility') == 0 ? 'checked' : '' }} />
                    <label class="form-check-label" for="visibility-0">Visible</label>
                </div>
                <div class="form-check">
                    <input name="visibility" class="form-check-input" type="checkbox" value="1" id="visibility-1"
                        {{ old('visibility') == 1 ? 'checked' : '' }} />
                    <label class="form-check-label" for="visibility-1">Unvisible</label>
                </div>

            </div>

            <!--Input for ingredients-->
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti <span class="text-secondary">*</span></label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
                    rows="5">{{ old('ingredients', $dish->ingredients) }}</textarea>
                @error('ingredients')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-warning" type="submit">Salva</button>

        </form>
    </div>
@endsection
