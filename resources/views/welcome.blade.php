@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container ">
            <h1 class="pt-5 text-center">
                Benvenuto su Delive<span class="primary_text">Boo</span>!
            </h1>
            <p class="text-center fs-3 mb-5">
                Il servizio di consegna cibo di prima qualità nella Città Eterna. Collabora con noi per espandere la portata
                del tuo ristorante e deliziare i clienti di tutta Roma con i tuoi piatti deliziosi.
            </p>

            <div class="row py-5 row-cols-1 row-cols-md-2 mb-3">
                <div class="col align-self-center text-center">
                    <h3 class="pb-2">
                        Perchè lavorare con Delive<span class="primary_text">Boo</span>?
                    </h3>
                    <ul class="list-unstyled">
                        <li>
                            <strong class="primary_text">
                                Espandi la tua portata:
                            </strong>
                            <br>
                            Conntettiti con centinaia di persone affamate a Roma.
                        </li>
                        <li>
                            <strong class="primary_text">
                                Aumenta le tue vendite:
                            </strong>
                            <br>
                            Aumenta i tuoi ricavi con gli ordini online e i servizi di consegna..
                        </li>
                        <li>
                            <strong class="primary_text">
                                Interfaccia facile da usare:
                            </strong>
                            <br>
                            Gestisci facilmente il tuo menu, gli ordini e le promozioni.
                        </li>
                        <li>
                            <strong class="primary_text">
                                Supporto Marketing:
                            </strong>
                            <br>
                            Beneficia di campagne di marketing e promozioni esclusive.
                        </li>
                    </ul>
                </div>
                <!-- /.col -->
                <div class="col">
                    <img src="{{ url('/img/Deliveboo-3.jpg') }}" class="light_shadow">
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row py-5 row-cols-1 row-cols-lg-2">
                <div class="col mb-3">
                    <img src="{{ url('/img/Deliveboo-4.jpg') }}" alt="" class="light_shadow">
                </div>
                <!-- /.col -->
                <div class="col align-self-center pl-5 text-center ">
                    <h3>
                        Come funziona
                    </h3>
                    <ul class="list-unstyled">
                        <li>
                            <strong class="primary_text">
                                Registazione:
                            </strong>
                            <br>
                            Registrati il tuo ristorante e crea un account.
                        </li>
                        <li>
                            <strong class="primary_text">
                                Elenca il tuo menu:
                            </strong>
                            <br>
                            Carica i tuoi piatti, personalizza il tuo menu e imposta i prezzi.
                        </li>
                        <li>
                            <strong class="primary_text">
                                Ricevi ordini:
                            </strong>
                            <br>
                            Ricevi notifiche di nuovi ordini e preparali per la consegna.
                        </li>
                        <li>
                            <strong class="primary_text">
                                Controlla le performance:
                            </strong>
                            <br>
                            Monitora le tue vendite e il feedback dei clienti in tempo reale.
                        </li>
                    </ul>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="container py-5">

                <h3 class="text-center pt-5">
                    Unisciti alla Delive<span class="primary_text">boo</span> Community
                </h3>

                <div class="row pt-3 row-cols-1 row-cols-md-3 d-flex gx-2">
                    <div class="col text-center border-bottom pb-3 pt-1" style="max-height: 85px">
                        <p>
                            Iscriviti oggi e diventa parte di Delive<span class="primary_text">boo</span> network.
                        </p>
                    </div>
                    <div class="col text-center border-bottom pb-3 pt-1">
                        <p class=" m-0">
                            Guadagna accesso a una base clienti più ampia e guarda crescere il tuo business.
                        </p>
                    </div>
                    <div class="col text-center border-bottom pb-3 pt-1">
                        <p>
                            Il nostro team è qui per supportarti in ogni passo del percorso.
                        </p>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->

            <div class="text-center">
                <h3>
                    Inizia
                </h3>
                <p class="mb-4">
                    Pronto a portare il tuo ristorante al livello successivo?
                    <br>
                    Fai clic sul pulsante qui sotto per registrarti e iniziare a mostrare i tuoi piatti deliziosi su
                    Delive<span class="primary_text">boo</span>!
                </p>
                <a href="{{ route('register') }}" class="button-85 my-2">Registrati qui</a>
            </div>
            <h5 class="text-center py-5">
                Grazie per aver scelto Delive<span class="primary_text">boo</span>. Creiamo insieme esperienze
                culinarie
                indimenticabili!
            </h5>
        </div>
    </div>
    <!-- /.container -->
@endsection
