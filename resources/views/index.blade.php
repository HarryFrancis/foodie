@extends("app")

@section("content")
    <h2>Places</h2>
    @include("places", ["places" => $places])
@endsection
