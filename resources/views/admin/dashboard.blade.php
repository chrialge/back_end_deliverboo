@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Ciao {{ Auth::user()->name }} !
        </h2>
        <h5>Informazioni sul tuo account:</h5>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <h5 class="pt-4">Informazioni sul tuo ristorante:</h5>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="py-1">
                                Nome: {{ $restaurant->name }}
                            </li>
                            <li class="py-1">
                                Numero di telefono: {{ $restaurant->phone_number }}
                            </li>
                            <li class="py-1">
                                Indirizzo: {{ $restaurant->address }}
                            </li>
                            <li class="py-1">
                                Partita IVA: {{ $restaurant->vat_number }}
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
