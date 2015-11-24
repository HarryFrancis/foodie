@extends("app")

@section("content")
    <h2>Health!</h2>
    @include("places", ["places" => $places])
@endsection
