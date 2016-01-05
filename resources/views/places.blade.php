<form name="distance" id="distance" method="post">

    <div class="form-group {{ $errors->has("distance") ? "has-error" : "" }}">
        <label for="distance">How many miles are you prepared to walk?</label>
        @if ($errors->has("distance"))
            <p>{{ $errors->first("distance") }}</p>
        @endif
        <input class="form-control" name="distance" id="distance" placeholder="Enter a distance in miles" value="{{ old("distance", $distance) > 0 ? old("distance", $distance) : 3 }}">
    </div>

    {!! csrf_field() !!}

</form>

@if (count($places))
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Healthiness</th>
            <th>Distance</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($places as $place)
        <tr>
            <td><a href="/places/{{ $place->slug }}">{{ $place->name }}</a></td>
            <td>{{ $place->health }}</td>
            <td>{{ $place->formattedDistance() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    @include("not-found")
@endif