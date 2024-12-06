<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Venue List') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{ route('venue.create') }}" class="btn btn-success mb-3">Create New Venue</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Capacity</th>
                            <th>Contact Info</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venues as $venue)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $venue->Name }}</td>
                                <td>{{ $venue->Address }}</td>
                                <td>{{ $venue->Capacity }}</td>
                                <td>{{ $venue->ContactInfo }}</td>
                                <td>
                                    <a href="{{ route('venue.show', $venue->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('venue.edit', $venue->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('venue.destroy', $venue->id) }}" method="POST" class="d-inline">
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
