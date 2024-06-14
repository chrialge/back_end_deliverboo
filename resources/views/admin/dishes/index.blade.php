@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($dishes as $dish)
            <h1>{{ $dish->name }}</h1>
        @endforeach

    </div>
@endsection
