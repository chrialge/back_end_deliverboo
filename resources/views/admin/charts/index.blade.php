@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Grafici</h1>
        <div class="row">
            <div class="col-6">
                <form action="{{ route('admin.charts.index') }}" method="get">
                    @csrf
                    <div class="mb-3">
                        <label for="year" class="form-label">Seleziona un anno</label>
                        <select class="form-select form-select-lg" name="year" id="year">
                            <option {{ $selectedYear == '2024' ? 'selected' : '' }} value="2024">2024</option>
                            <option {{ $selectedYear == '2023' ? 'selected' : '' }} value ="2023">2023</option>
                            <option {{ $selectedYear == '2022' ? 'selected' : '' }} value="2022">2022</option>
                            <option {{ $selectedYear == '2021' ? 'selected' : '' }} value="2021">2021</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Seleziona
                    </button>
                </form>
                <!-- /year -->

                <div>
                    {!! $chartjs->render() !!}
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
