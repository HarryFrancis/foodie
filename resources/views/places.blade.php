<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Healthiness</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($places as $place)
        <tr>
            <td><a href="/places/{{ $place->id }}">{{ $place->name }}</a></td>
            <td>{{ $place->health }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
