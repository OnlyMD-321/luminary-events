<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Edit Feedback') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12 mb-3">
                        <label for="IDClient" class="form-label">Client</label>
                        <select id="IDClient" name="IDClient" class="form-control" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $feedback->IDClient == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="IDEventReservation" class="form-label">Event Reservation</label>
                        <select id="IDEventReservation" name="IDEventReservation" class="form-control" required>
                            @foreach($eventReservations as $eventReservation)
                                <option value="{{ $eventReservation->id }}" {{ $feedback->IDEventReservation == $eventReservation->id ? 'selected' : '' }}>
                                    {{ $eventReservation->event->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Rating" class="form-label">Rating (1-5)</label>
                        <input type="number" id="Rating" name="Rating" class="form-control" value="{{ $feedback->Rating }}" min="1" max="5" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Comments" class="form-label">Comments</label>
                        <textarea id="Comments" name="Comments" class="form-control">{{ $feedback->Comments }}</textarea>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>