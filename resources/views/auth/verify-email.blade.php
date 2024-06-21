@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifica il tuo indirizzo Email') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('È stato inviato un nuovo link di verifica fresco al tuo indirizzo email.') }}
                            </div>
                        @endif

                        {{ __('Prima di procedere, controlla la tua email per trovare il link di verifica.') }}
                        {{ __(`Se non hai ricevuto l'email`) }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __(`clicca qui per richiederne un'altra`) }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
