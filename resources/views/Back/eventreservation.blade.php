<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Event Reservation List') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="GET" class="row mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search by event ID..." value="{{ request('search') }}">
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event ID</th>
                            <th>Client Name</th>
                            <th>Seats</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventReservations as $eventReservation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $eventReservation->IDEvent }}</td>
                                <td>{{ $eventReservation->client->name }}</td>
                                <td>{{ $eventReservation->NombreSeats }}</td>
                                <td>
                                    <a href="{{ route('eventreservation.show', $eventReservation->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('eventreservation.edit', $eventReservation->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('eventreservation.destroy', $eventReservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
