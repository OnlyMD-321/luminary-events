<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Venue Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $venue->Name }}</p>
                <p><strong>Address:</strong> {{ $venue->Address }}</p>
                <p><strong>Capacity:</strong> {{ $venue->Capacity }}</p>
                <p><strong>Contact Info:</strong> {{ $venue->ContactInfo }}</p>

                <a href="{{ route('venue.index') }}" class="btn btn-secondary mt-3">Back to Venues</a>
            </div>
        </div>
    </div>

</x-app-layout>
