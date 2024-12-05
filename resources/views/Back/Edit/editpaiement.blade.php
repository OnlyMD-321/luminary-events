<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Paiement') }}
        </h2>


    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('paiement.update', $paiement->id) }}" method="post" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" id="date" name="date" value="{{ old('date', $paiement->date) }}" required class="form-control">
                        @error('date')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="periode" class="form-label">Periode:</label>
                        <input type="date" id="periode" name="periode" value="{{ old('periode', $paiement->periode) }}" required class="form-control">
                        @error('periode')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="annee" class="form-label">Annee:</label>
                        <input type="number" id="annee" name="annee" value="{{ old('annee', $paiement->annee) }}" required class="form-control">
                        @error('annee')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="montant_total" class="form-label">Montant Total:</label>
                        <input type="number" id="montant_total" name="montant_total" value="{{ old('montant_total', $paiement->montant_total) }}" required class="form-control">
                        @error('montant_total')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('paiement') }}'">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
