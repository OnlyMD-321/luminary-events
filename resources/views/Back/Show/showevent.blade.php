<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Event Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>{{ $event->Nom }}</h4>
                <p><strong>Description:</strong> {{ $event->Description }}</p>
                <p><strong>Venue:</strong> {{ $event->venue->name }}</p>
                <p><strong>Categories:</strong> {{ $event->categories->pluck('name')->join(', ') }}</p>
                <a href="{{ route('event.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
