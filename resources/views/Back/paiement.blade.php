<x-app-layout>
        <h2 class="font-semibold text-xl">
            {{ __('Paiements') }}
        </h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <a href="/addpaiement" class="btn btn-primary mb-3">Add new paiement</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Periode</th>
                                    <th>Année</th>
                                    <th>Montant Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paiements as $paiement)
                                    <tr>
                                        <td>{{ $paiement->id }}</td>
                                        <td>{{ $paiement->date }}</td>
                                        <td>{{ $paiement->periode }}</td>
                                        <td>{{ $paiement->annee }}</td>
                                        <td>{{ $paiement->montant_total }}</td>
                                        <td>
                                            <a href="{{ route('paiement.show', $paiement->id) }}" class="btn btn-success">View</a>
                                            <a href="{{ route('paiement.edit', $paiement->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('paiement.delete', $paiement->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this paiement?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
