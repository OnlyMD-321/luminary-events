<x-app-layout>
    <h2 class="font-semibold text-xl mb-4 text-center">
        {{ __('Clients') }}
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
                            <form method="GET" action="{{ route('client') }}" class="flex items-center">
                                <input type="text" name="search" placeholder="Search by designation" class="form-control mr-2 w-full" value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-secondary mr-2">Search</button>
                            </form>
                            <a href="/addclient" class="btn btn-primary single-line">Add New Client</a>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Tel</th>
                                    <th>ICE</th>
                                    <th>IF</th>
                                    <th>RC</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->designation }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->tel }}</td>
                                        <td>{{ $client->ice }}</td>
                                        <td>{{ $client->if }}</td>
                                        <td>{{ $client->rc }}</td>
                                        <td>
                                            <a href="{{ route('client.show', $client->id) }}" class="btn btn-success btn-sm">View</a>
                                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('client.delete', $client->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
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
