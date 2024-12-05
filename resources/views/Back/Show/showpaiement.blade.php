<x-app-layout>
        <h2 class="font-semibold text-xl">
            {{ __('Paiement Details') }}
        </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form class="row g-3">
                    @csrf

                    <div class="col-12">
                        <label for="date" class="form-label">Date:</label>
                        <input readonly type="text" id="date" name="date" value="{{ old('date', $paiement->date) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="periode" class="form-label">Période:</label>
                        <input readonly type="text" id="periode" name="periode" value="{{ old('periode', $paiement->periode) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="annee" class="form-label">Année:</label>
                        <input readonly type="text" id="annee" name="annee" value="{{ old('annee', $paiement->annee) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="montant_total" class="form-label">Montant Total:</label>
                        <input readonly type="text" id="montant_total" name="montant_total" value="{{ old('montant_total', $paiement->montant_total) }}" required class="form-control">
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="/paiement" class="btn btn-secondary ms-2">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
