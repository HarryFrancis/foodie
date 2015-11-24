@extends("app")

@section("content")
    <h2>{{ $place->name }}</h2>

    <h3>Details</h3>
    <ul>
        <li><strong>Healthiness:</strong> {{ $place->health }}</li>
    </ul>
@endsection
