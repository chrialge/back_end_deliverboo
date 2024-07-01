@extends('layouts.admin')

@section('content')
    <div class="container pb-5">

        <h1 class="py-5">Statistiche</h1>
        <div class="row row-cols-1  row-cols-lg-2 flex-lg-nowrap gap-2">
            <div class="col d-flex justify-content-center flex-column">
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
                    {!! $chartjs->render() !!}
                </div>

            </div>
            <div class="col d-flex flex-column" style="aspect-ratio: 1;">


                {!! $chartprofits->render() !!}


            </div>
            <!-- /.col-6 -->
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
