<x-app-layout>
    <h2 class="font-semibold text-xl mb-4 text-center">{{ __('Event Categories') }}</h2>

    @if(session()->has('success'))
        <div class="alert alert-success text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="flex justify-between mb-6">
                            <form method="GET" action="{{ route('eventcategory.index') }}" class="flex items-center">
                                <input type="text" name="search" placeholder="Search by Event ID" class="form-control mr-2 w-full" value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-secondary">Search</button>
                            </form>
                            <a href="{{ route('eventcategory.create') }}" class="btn btn-primary">Add Event Category</a>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Event</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventCategories as $eventCategory)
                                    <tr>
                                        <td>{{ $eventCategory->id }}</td>
                                        <td>{{ $eventCategory->event->name }}</td>
                                        <td>{{ $eventCategory->category->name }}</td>
                                        <td>
                                            <a href="{{ route('eventcategory.show', $eventCategory->id) }}" class="btn btn-success btn-sm">View</a>
                                            <a href="{{ route('eventcategory.edit', $eventCategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('eventcategory.destroy', $eventCategory->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
