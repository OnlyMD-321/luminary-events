<x-app-layout>
        <h2 class="font-semibold text-xl">
            {{ __('Service Details') }}
        </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form class="row g-3">
                    @csrf

                    <div class="col-12">
                        <label for="type" class="form-label">Type:</label>
                        <input readonly type="text" id="type" name="type" value="{{ old('type', $service->type) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="libelle" class="form-label">Libelle:</label>
                        <input readonly type="text" id="libelle" name="libelle" value="{{ old('libelle', $service->libelle) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="montant" class="form-label">Montant:</label>
                        <input readonly type="text" id="montant" name="montant" value="{{ old('montant', $service->montant) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="taux_tva" class="form-label">Taux TVA:</label>
                        <input readonly type="text" id="taux_tva" name="taux_tva" value="{{ old('taux_tva', $service->taux_tva) }}" required class="form-control">
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="/service" class="btn btn-secondary ms-2">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
