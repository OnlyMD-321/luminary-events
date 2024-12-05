<x-app-layout>
    <h2 class="font-semibold text-xl mb-4 text-center">
        {{ __('Contracts') }}
    </h2>

    @if(session()->has('message'))
        <div class="alert alert-success text-center mb-4">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <!-- Search and Add Button -->
                        <div class="flex justify-between mb-6">
                            <form method="GET" action="{{ route('contract') }}" class="flex items-center">
                                <input type="text" name="search" placeholder="Search by contract number" class="form-control mr-2 w-full" value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-secondary mr-2">Search</button>
                            </form>
                            <a href="/addcontrat" class="btn btn-primary single-line">Add New Contract</a>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Numero Contrat</th>
                                    <th>Date Signature</th>
                                    <th>Date Effet</th>
                                    <th>Type Contrat</th>
                                    <th>Mode Reglement</th>
                                    <th>Signataire</th>
                                    <th>Service Fourni</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contracts as $contract)
                                    <tr>
                                        <td>{{ $contract->numero_contrat }}</td>
                                        <td>{{ $contract->date_signature }}</td>
                                        <td>{{ $contract->date_effet }}</td>
                                        <td>{{ $contract->type_contrat }}</td>
                                        <td>{{ $contract->mode_reglement }}</td>
                                        <td>{{ $contract->signataire }}</td>
                                        <td>
                                            @foreach($contract->services as $service)
                                                {{ $service->libelle }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('contract.show', $contract->id) }}" class="btn btn-success btn-sm">View</a>
                                            <a href="{{ route('contract.edit', $contract->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('contract.delete', $contract->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contract?')">Delete</button>
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
