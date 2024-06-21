@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Ciao {{ Auth::user()->name }} !
        </h2>
        <p>Informazioni sul tuo account:</p>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="py-1">
                                Nome: {{ Auth::user()->name }}
                            </li>
                            <li class="py-1">
                                Cognome: {{ Auth::user()->last_name }}
                            </li>
                            <li class="py-1">
                                Indirizzo e-mail: {{ Auth::user()->email }}
                            </li>
                            <li class="py-1">
                                Account creato il: {{ Auth::user()->created_at }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
