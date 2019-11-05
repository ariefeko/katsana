<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Datetime</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Speed (kmh)</th>
            <th>Distance (m)</th>
            <th>Voltage</th>
        </tr>
    </thead>
    <tbody>
        @foreach($positions as $position)
            <tr>
                <td>{{ $position->id }}</td>
                <td>{{ $position->tracked_at }}</td>
                <td>{{ $position->latitude }}</td>
                <td>{{ $position->longitude }}</td>
                <td>{{ $position->speed }}</td>
                <td>{{ $position->distance }}</td>
                <td>{{ $position->voltage }}</td>
            </tr>
        @endforeach
    </tbody>
</table>