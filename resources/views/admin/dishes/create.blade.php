@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="d-flex align-items-center justify-content-between">
            <h1>Crea un nuovo piatto</h1>
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-dark">
                Torna ai piatti
            </a>
        </div>
        <div class="text-secondary pb-4">* campo obbligatorio</div>

        @include('partials.validate')

        <form class="form-control bg-light p-4" action="{{ route('admin.dishes.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <!-- Input for name-->
            <div class="mb-3">
                <label for="name" class="form-label">Nome <span class="text-secondary">*</span></label>
                <input onkeyup="check_name()" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" id="name" aria-describedby="nameHelper" placeholder="name"
                    value="{{ old('name') }}" required />

                <small id="name_error" class="small_invisible">Il nome deve essere di almeno tre caratteri</small>

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for image-->
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" aria-describedby="imageHelper" placeholder="image" value="{{ old('image') }}" />
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input for price-->
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo <span class="text-secondary">*</span></label>
                <input type="number" step="0.01" min="0.00"
                    class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                    aria-describedby="priceHelper" placeholder="price" value="{{ old('price') }}" required
                    onkeyup="check_price()" />
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <small id="price_error" class="small_invisible">Il prezzo deve essere un numero non negativo!</small>
            </div>

            <!-- Input for Visibility -->
            <div class="mb-3">
                <label for="visibility" class="form-label">Vuoi rendere questo prodotto visibile fin da subito?</label>
                <div class="form-check">
                    <input id="visibility-toggle" name="visibility" class="form-check-input" type="checkbox"
                        value="0" />
                    <label class="form-check-label" for="visibility-toggle">Sì</label>
                </div>
            </div>

            <!--Input for ingredients-->
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti <span class="text-secondary">*</span></label>
                <textarea onkeyup="check_ingredients()" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
                    rows="5" required>{{ old('ingredients') }}</textarea>

                <small id="ingredients_error" class="small_invisible">Inserisci una breve descrizione di almeno 10 caratteri</small>


                @error('ingredients')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button onclick="check_types()" id="dish-submit-button" class="btn btn-primary" type="submit">Aggiungi piatto</button>

        </form>

        <script src="{{ asset('js/dish-checker.js') }}"></script>
    </div>
@endsection
