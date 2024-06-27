@extends('layouts.admin')

@section('content')
    <h1>Chart</h1>

    <div>
        {!! $chartjs->render() !!}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
