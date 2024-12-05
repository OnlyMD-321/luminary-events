<x-app-layout>
<h2 class="font-semibold text-xl">
{{ __('Add New Paiement') }}
</h2>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('paiement.create') }}" method="post" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" id="date" name="date" required class="form-control">
                </div>
                <div class="col-12">
                    <label for="periode" class="form-label">Periode:</label>
                    <input type="date" id="periode" name="periode" required class="form-control">
                </div>
                <div class="col-12">
                    <label for="annee" class="form-label">Annee:</label>
                    <input type="number" id="annee" name="annee" required class="form-control">
                </div>
                <div class="col-12">
                    <label for="facture_id" class="form-label">Facture:</label>
                    <select id="facture_id" name="facture_id" required class="form-control">
                        <option value="">Select Facture</option>
                        @foreach($factures as $facture)
                            <option value="{{ $facture->id }}">{{ $facture->numero_facture }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="montant_total" class="form-label">Montant Total:</label>
                    <input type="text" id="montant_total" name="montant_total" required class="form-control" readonly>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('paiement') }}'">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const factureData = @json($factureData);
        const factureSelect = document.getElementById('facture_id');
        const montantTotalInput = document.getElementById('montant_total');

        factureSelect.addEventListener('change', function() {
            const selectedFacture = factureData.find(facture => facture.id == this.value);
            montantTotalInput.value = selectedFacture ? selectedFacture.montant_total : '';
        });
    });
</script>
</x-app-layout>
