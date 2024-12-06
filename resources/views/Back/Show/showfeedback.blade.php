<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Feedback Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>Client: {{ $feedback->client->name }}</h4>
                <p><strong>Event Reservation:</strong> {{ $feedback->eventReservation->event->name }}</p>
                <p><strong>Rating:</strong> {{ $feedback->Rating }}</p>
                <p><strong>Comments:</strong> {{ $feedback->Comments }}</p>
                <a href="{{ route('feedback.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>

</x-app-layout>
