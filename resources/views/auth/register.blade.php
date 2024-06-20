@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 deliverboo_text">
                <h1 class="mt-4 text-center">Registrati</h1>
                <div class="text-center text-secondary pb-4">* campo obbligatorio</div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4 row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">
                            Nome <span class="text-secondary">*</span>
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Mario">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.name -->

                    <div class="mb-4 row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">
                            Cognome <span class="text-secondary">*</span>
                        </label>

                        <div class="col-md-6">
                            <input id="last_name" type="last_name"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{ old('last_name') }}" required autocomplete="last_name" autofocus
                                placeholder="Rossi">

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.last_name -->

                    <div class="mb-4 row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">
                            Indirizzo E-Mail <span class="text-secondary">*</span>
                        </label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="mario@rossi.it">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.e-mail -->

                    <div class="mb-4 row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">
                            Password <span class="text-secondary">*</span>
                        </label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="********" onkeyup='check_pw();'>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.password -->

                    <div class="mb-4 row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                            Conferma Password <span class="text-secondary">*</span>
                        </label>

                        <div class="col-md-6" id="error_message">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="********" onkeyup='check_pw();'>
                            <small id="password_error" class="small_invisible">La password non coincide</small>
                        </div>
                    </div>
                    <!-- /.passwod_confirm -->

                    <!-- Input for name-->
                    <div class="mb-4 row">
                        <label for="name_restaurant" class="col-md-4 col-form-label text-md-right">
                            Nome Ristorante <span class="text-secondary">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name_restaurant') is-invalid @enderror"
                                name="name_restaurant" id="name_restaurant" aria-describedby="nameHelper"
                                placeholder="Ossi di seppia" value="{{ old('name_restaurant') }}" required />
                            @error('name_restaurant')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Input for phone number -->
                    <div class="mb-4 row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">
                            Numero di telefono
                        </label>

                        <div class="col-md-6">
                            <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                name="phone_number" id="phone_number" aria-describedby="phone_numberHelper"
                                placeholder="3202345654" value="{{ old('phone_number') }}" required />
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Input for address-->
                    <div class="mb-4 row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">
                            Indirizzo
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" id="address" aria-describedby="addressHelper"
                                placeholder="via della repubblica, 5" value="{{ old('address') }}" required />
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Input for image-->
                    <div class="mb-4 row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">
                            Immagine
                        </label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" id="image" aria-describedby="imageHelper"
                                value="{{ old('image') }}" />
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Input for VAT number-->
                    <div class="mb-4 row">
                        <label for="vat_number" class="col-md-4 col-form-label text-md-right">
                            Partita IVA <span class="text-secondary">*</span>
                        </label>

                        <div class="col-md-6">
                            <input type="number" minlength="11" maxlength="11"
                                class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                id="vat_number" aria-describedby="vat_numberHelper" placeholder="12345678901"
                                value="{{ old('vat_number') }}" required onkeyup='check_vat_number()' />
                            <small id="vat_number_error" class="small_invisible">Il Vat Number deve essere di 11 cifre
                                numeriche</small>
                            @error('vat_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-4 col-form-label pb-1">
                        Seleziona almeno un tipo di cucina
                    </div>
                    <div class="mb-4 row row-cols-6">
                        @foreach ($types as $type)
                            <div class="col d-flex">
                                <div class="form-check">
                                    <input name="types[]" class="form-check-input" type="checkbox"
                                        onclick="check_types()" value="{{ $type->id }}"
                                        id="type-{{ $type->id }}"
                                        {{ in_array($type->id, old('types', [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="type-{{ $type->id }}">
                                        {{ $type->name }}
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                        @endforeach
                    </div>
                    <small id="types_error" class="small_invisible">Devi selezionare almeno un tipo!</small>


                    <div class="mb-4 row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button onclick="check_types()" id="register-submit-button" type="submit"
                                class="btn btn-dark">
                                {{ __('Registrati') }}
                            </button>
                        </div>
                    </div>
                    <!-- /.submit button -->
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
