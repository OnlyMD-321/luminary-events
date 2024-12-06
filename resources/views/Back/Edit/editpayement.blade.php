<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Edit Paiement') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('paiement.update', $paiement->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12 mb-3">
                        <label for="ModePaiement" class="form-label">Mode Paiement</label>
                        <select id="ModePaiement" name="ModePaiement" class="form-control" required>
                            <option value="Cash" {{ $paiement->ModePaiement == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="PayPal" {{ $paiement->ModePaiement == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                            <option value="Carte" {{ $paiement->ModePaiement == 'Carte' ? 'selected' : '' }}>Carte</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="IDEventReservation" class="form-label">Event Reservation</label>
                        <select id="IDEventReservation" name="IDEventReservation" class="form-control" required>
                            @foreach($eventReservations as $eventReservation)
                                <option value="{{ $eventReservation->id }}" {{ $paiement->IDEventReservation == $eventReservation->id ? 'selected' : '' }}>
                                    {{ $eventReservation->event->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="IDUser" class="form-label">User</label>
                        <select id="IDUser" name="IDUser" class="form-control" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $paiement->IDUser == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="PrixTTC" class="form-label">Prix TTC</label>
                        <input type="number" id="PrixTTC" name="PrixTTC" class="form-control" value="{{ $paiement->PrixTTC }}" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <select id="Status" name="Status" class="form-control">
                            <option value="Pending" {{ $paiement->Status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Successful" {{ $paiement->Status == 'Successful' ? 'selected' : '' }}>Successful</option>
                            <option value="Failed" {{ $paiement->Status == 'Failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Paiement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
