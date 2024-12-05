<x-app-layout>
    <h2 class="font-semibold text-xl">
        {{ __('Add New Contract') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('contract.create') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="numero_contrat" class="form-label">Numero Contrat:</label>
                        <input type="text" id="numero_contrat" name="numero_contrat" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="date_signature" class="form-label">Date Signature:</label>
                        <input type="date" id="date_signature" name="date_signature" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="date_effet" class="form-label">Date Effet:</label>
                        <input type="date" id="date_effet" name="date_effet" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="type_contrat" class="form-label">Type Contrat:</label>
                        <input type="text" id="type_contrat" name="type_contrat" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="mode_reglement" class="form-label">Mode Reglement:</label>
                        <input type="text" id="mode_reglement" name="mode_reglement" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="signataire" class="form-label">Signataire:</label>
                        <input type="text" id="signataire" name="signataire" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="services" class="form-label">Services:</label>
                        @foreach($services as $service)
                            <div>
                                <input type="checkbox" id="service_{{ $service }}" name="service_libelle[]" value="{{ $service }}" class="form-check-input">
                                <label for="service_{{ $service }}" class="form-check-label">{{ $service }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12">
                        <label for="client_id" class="form-label">Client:</label>
                        <select id="client_id" name="client_id" required class="form-control">
                            <option value="">Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->designation }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('contract') }}'">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
