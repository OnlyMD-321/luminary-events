<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Paiement List') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{ route('paiement.create') }}" class="btn btn-success mb-3">Create New Paiement</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mode Paiement</th>
                            <th>Reservation</th>
                            <th>User</th>
                            <th>Prix TTC</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paiements as $paiement)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paiement->ModePaiement }}</td>
                                <td>{{ $paiement->eventReservation->event->name }}</td>
                                <td>{{ $paiement->user->name }}</td>
                                <td>{{ $paiement->PrixTTC }}</td>
                                <td>{{ $paiement->Status }}</td>
                                <td>
                                    <a href="{{ route('paiement.show', $paiement->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('paiement.edit', $paiement->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('paiement.destroy', $paiement->id) }}" method="POST" class="d-inline">
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
