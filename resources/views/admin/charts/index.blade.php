@extends('layouts.admin')

@section('content')
    <h1>Grafici</h1>

    <form action="{{ route('admin.charts.index') }}" method="get">
        @csrf
        <div class="mb-3">
            <label for="year" class="form-label">Seleziona un anno</label>
            <select class="form-select form-select-lg" name="year" id="year">
                <option value="2024" selected>2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
