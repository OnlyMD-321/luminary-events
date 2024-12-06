<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Event Type Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4>{{ $EventType->Name }}</h4>
                <p><strong>Description:</strong> {{ $EventType->Description }}</p>
                <a href="{{ route('EventType.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>

</x-app-layout>
