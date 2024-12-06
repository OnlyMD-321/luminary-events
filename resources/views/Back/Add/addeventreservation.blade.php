<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Create Event Reservation') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('eventreservation.store') }}" method="POST">
                    @csrf

                    <div class="col-12 mb-3">
                        <label for="IDClient" class="form-label">Client</label>
                        <select id="IDClient" name="IDClient" class="form-control" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="IDEvent" class="form-label">Event</label>
                        <select id="IDEvent" name="IDEvent" class="form-control" required>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}">{{ $event->Nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="DateReservation" class="form-label">Reservation Date</label>
                        <input type="date" id="DateReservation" name="DateReservation" class="form-control" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="NombreSeats" class="form-label">Number of Seats</label>
                        <input type="number" id="NombreSeats" name="NombreSeats" class="form-control" min="1" required>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Create Reservation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
