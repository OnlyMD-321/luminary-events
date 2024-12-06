<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Event Reservation Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>Event ID: {{ $eventReservation->IDEvent }}</h4>
                <p><strong>Client:</strong> {{ $eventReservation->client->name }}</p>
                <p><strong>Seats:</strong> {{ $eventReservation->NombreSeats }}</p>
                <p><strong>Reservation Date:</strong> {{ $eventReservation->DateReservation }}</p>
                <a href="{{ route('eventreservation.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
