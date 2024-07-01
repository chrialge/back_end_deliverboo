@extends('layouts.admin')

@section('content')
    <div class="container pb-5">

        <h1 class="py-3">Statistiche</h1>
        <div class="row row-cols-1  row-cols-lg-2 flex-lg-nowrap gap-2">
            <div class="col col-md-2 col-sm-1 d-flex flex-column">

                <p>
                    Benenuto nella pagina delle statistiche, da qua puoi controllare il numero di ordini mensili del tuo
                    ristorante anno dopo anno
                </p>

                <form action="{{ route('admin.charts.index') }}" method="get">
                    @csrf
                    <div class="mb-3">
                        <label for="year" class="form-label">Seleziona un anno</label>
                        <select class="form-select form-select-lg" name="year" id="year">
                            <option {{ $selectedYear == 'lastmonths' ? 'selected' : '' }} value="lastmonths">
                                Ultimi 12 mesi
                            </option>
                            <option {{ $selectedYear == '2024' ? 'selected' : '' }} value="2024">2024</option>
                            <option {{ $selectedYear == '2023' ? 'selected' : '' }} value ="2023">2023</option>
                            <option {{ $selectedYear == '2022' ? 'selected' : '' }} value="2022">2022</option>
                            <option {{ $selectedYear == '2021' ? 'selected' : '' }} value="2021">2021</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark">
                        Seleziona
                    </button>
                </form>
                <!-- /year -->

                <p class="pt-5">
                    Il totale delle vendite per l'anno {{ $selectedYear }} ammonta a: {{ $totalYear }}€
                </p>

                <div>
                    <h4>Andamento ordini</h4>
                    {!! $chartjs->render() !!}
                </div>
            </div>

            <div class="col col-md-2 col-sm-1 d-flex flex-column">
                <div>
                    <h4>Andamento vendite</h4>
                    {!! $chartprofits->render() !!}
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
