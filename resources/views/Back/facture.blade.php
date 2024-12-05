<x-app-layout>
    <h2 class="font-semibold text-xl">
        {{ __('Factures') }}
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
                        <!-- Search and Add Button -->
                        <div class="flex justify-between mb-6">
                            <form method="GET" action="{{ route('facture') }}" class="flex items-center">
                                <input type="text" name="search" placeholder="Search by client name" class="form-control mr-2 w-full" value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-secondary mr-2">Search</button>
                            </form>
                            <!-- <a href="/addfacture" class="btn btn-primary single-line">Add New Facture</a> -->
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Numero Facture</th>
                                    <th>Nom Client</th>
                                    <th>Date Facture</th>
                                    <th>Montant Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($factures as $facture)
                                    <tr>
                                        <td>{{ $facture->numero_facture }}</td>
                                        <td>{{ $facture->nom_client }}</td>
                                        <td>{{ $facture->date_facture }}</td>
                                        <td>{{ $facture->montant_total }}</td>
                                        <td>
                                            <a href="{{ route('facture.show', $facture->id) }}" class="btn btn-success">Details</a>
                                            <!-- <a href="/pay" class="btn btn-secodary">Pay</a> -->
                                            <form action="{{ route('facture.delete', $facture->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this facture?')" class="btn btn-danger">Delete</button>
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
