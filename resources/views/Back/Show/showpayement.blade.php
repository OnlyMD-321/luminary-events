<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Paiement Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Mode of Payment:</strong> {{ $paiement->ModePaiement }}</p>
                <p><strong>Event Reservation:</strong> {{ $paiement->eventReservation->event->name }}</p>
                <p><strong>User:</strong> {{ $paiement->user->name }}</p>
                <p><strong>Prix TTC:</strong> {{ $paiement->PrixTTC }}</p>
                <p><strong>Status:</strong> {{ $paiement->Status }}</p>
                <a href="{{ route('paiement.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>

</x-app-layout>
