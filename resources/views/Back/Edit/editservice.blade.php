<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Service') }}
        </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('service.update', $service->id) }}" method="post" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label for="type" class="form-label">Type:</label>
                        <input type="text" id="type" name="type" value="{{ old('type', $service->type) }}" required class="form-control">
                        @error('type')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="libelle" class="form-label">Libelle:</label>
                        <input type="text" id="libelle" name="libelle" value="{{ old('libelle', $service->libelle) }}" required class="form-control">
                        @error('libelle')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="montant" class="form-label">Montant:</label>
                        <input type="number" id="montant" name="montant" value="{{ old('montant', $service->montant) }}" required class="form-control">
                        @error('montant')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="taux_tva" class="form-label">Total TVA:</label>
                        <input  readonly type="number" id="taux_tva" name="taux_tva" value="{{ old('taux_tva', $service->taux_tva) }}" required class="form-control">
                        @error('taux_tva')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('service') }}'">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
