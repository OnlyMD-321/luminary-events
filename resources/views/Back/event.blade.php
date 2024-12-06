<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Event List') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="GET" class="row mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search by event name..." value="{{ request('search') }}">
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->Nom }}</td>
                                <td>{{ $event->Description }}</td>
                                <td>
                                    <a href="{{ route('event.show', $event->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('event.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="d-inline">
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
