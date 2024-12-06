<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Feedback List') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{ route('feedback.create') }}" class="btn btn-success mb-3">Create New Feedback</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Event Reservation</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $feedback->client->name }}</td>
                                <td>{{ $feedback->eventReservation->event->name }}</td>
                                <td>{{ $feedback->Rating }}</td>
                                <td>
                                    <a href="{{ route('feedback.show', $feedback->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="d-inline">
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
