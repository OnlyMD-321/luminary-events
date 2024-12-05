<x-app-layout>
        <h2 class="font-semibold text-xl">
            {{ __('Services') }}
        </h2>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <a href="/addservice" class="btn btn-primary mb-3">Add new service</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Libelle</th>
                                    <th>Montant</th>
                                    <th>Total TVA</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->type }}</td>
                                        <td>{{ $service->libelle }}</td>
                                        <td>{{ $service->montant }}</td>
                                        <td>{{ $service->taux_tva }}</td>
                                        <td>
                                            <a href="{{ route('service.show', $service->id) }}" class="btn btn-success">View</a>
                                            <a href="{{ route('service.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('service.delete', $service->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this service?')" class="btn btn-danger">Delete</button>
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
