<x-app-layout>
    <h2 class="font-semibold text-xl">
        {{ __('Add New Facture') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('facture.create') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="numero_facture" class="form-label">Numero Facture:</label>
                        <input type="text" id="numero_facture" name="numero_facture" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="nom_client" class="form-label">Nom Client:</label>
                        <input type="text" id="nom_client" name="nom_client" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="date_facture" class="form-label">Date Facture:</label>
                        <input type="date" id="date_facture" name="date_facture" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="montant_total" class="form-label">Montant Total:</label>
                        <input type="text" id="montant_total" name="montant_total" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="service_id" class="form-label">Service:</label>
                        <select id="service_id" name="service_id" required class="form-control">
                            <option value="">Select Service</option>
                            @foreach($serviceIds as $serviceId)
                                <option value="{{ $serviceId }}">{{ $serviceId }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('facture') }}'">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
