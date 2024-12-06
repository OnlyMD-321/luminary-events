<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Event Type List') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{ route('EventType.create') }}" class="btn btn-success mb-3">Create New Type</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($EventTypes as $EventType)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $EventType->Name }}</td>
                                <td>{{ $EventType->Description }}</td>
                                <td>
                                    <a href="{{ route('EventType.show', $EventType->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('EventType.edit', $EventType->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('EventType.destroy', $EventType->id) }}" method="POST" class="d-inline">
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
