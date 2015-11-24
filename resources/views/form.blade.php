@extends("app")

@section("content")
<h2>Add Food Place</h2>

<form method="post">
    <div class="form-group {{ $errors->has("name") ? "has-error" : "" }}">
        <label for="name">Name</label>
        @if ($errors->has("name"))
            <p>{{ $errors->first("name") }}</p>
        @endif
        <input class="form-control" name="name" id="name" placeholder="Name" value="{{ old("name") }}">
    </div>

    <div class="form-group {{ $errors->has("health") ? "has-error" : "" }}">
        <label for="health">Healthiness</label>
        @if ($errors->has("health"))
            <p>{{ $errors->first("health") }}</p>
        @endif
        <input type="number" min="1" max="5" name="health" class="form-control" id="health" placeholder="Health" value="{{ old("health") }}">
    </div>

    {!! csrf_field() !!}

    <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection
