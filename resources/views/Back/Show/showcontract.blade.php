<x-app-layout>
    <h2 class="font-semibold text-xl">
        {{ __('Contract Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form class="row g-3">
                    @csrf

                    <div class="col-12">
                        <label for="numero_contrat" class="form-label">Numero Contrat:</label>
                        <input readonly type="text" id="numero_contrat" name="numero_contrat" value="{{ old('numero_contrat', $contract->numero_contrat) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="date_signature" class="form-label">Date Signature:</label>
                        <input readonly type="date" id="date_signature" name="date_signature" value="{{ old('date_signature', $contract->date_signature) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="date_effet" class="form-label">Date Effet:</label>
                        <input readonly type="date" id="date_effet" name="date_effet" value="{{ old('date_effet', $contract->date_effet) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="type_contrat" class="form-label">Type Contrat:</label>
                        <input readonly type="text" id="type_contrat" name="type_contrat" value="{{ old('type_contrat', $contract->type_contrat) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="mode_reglement" class="form-label">Mode Reglement:</label>
                        <input readonly type="text" id="mode_reglement" name="mode_reglement" value="{{ old('mode_reglement', $contract->mode_reglement) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="signataire" class="form-label">Signataire:</label>
                        <input readonly type="text" id="signataire" name="signataire" value="{{ old('signataire', $contract->signataire) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="service_fourni" class="form-label">Service Fourni:</label>
                        <input readonly type="text" id="service_fourni" name="service_fourni" value="{{ old('service_fourni', $contract->service_fourni) }}" required class="form-control">
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="/contract" class="btn btn-secondary ms-2">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
