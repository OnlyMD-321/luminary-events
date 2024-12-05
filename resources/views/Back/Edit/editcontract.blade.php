<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit Contract') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('contract.update', $contract->id) }}" method="post" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label for="numero_contrat" class="form-label">Numero Contrat:</label>
                        <input type="text" id="numero_contrat" name="numero_contrat" value="{{ old('numero_contrat', $contract->numero_contrat) }}" required class="form-control">
                        @error('numero_contrat')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="date_signature" class="form-label">Date Signature:</label>
                        <input type="date" id="date_signature" name="date_signature" value="{{ old('date_signature', $contract->date_signature) }}" required class="form-control">
                        @error('date_signature')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="date_effet" class="form-label">Date Effet:</label>
                        <input type="date" id="date_effet" name="date_effet" value="{{ old('date_effet', $contract->date_effet) }}" required class="form-control">
                        @error('date_effet')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="type_contrat" class="form-label">Type Contrat:</label>
                        <input type="text" id="type_contrat" name="type_contrat" value="{{ old('type_contrat', $contract->type_contrat) }}" required class="form-control">
                        @error('type_contrat')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="mode_reglement" class="form-label">Mode Reglement:</label>
                        <input type="text" id="mode_reglement" name="mode_reglement" value="{{ old('mode_reglement', $contract->mode_reglement) }}" required class="form-control">
                        @error('mode_reglement')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="signataire" class="form-label">Signataire:</label>
                        <input type="text" id="signataire" name="signataire" value="{{ old('signataire', $contract->signataire) }}" required class="form-control">
                        @error('signataire')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="services" class="form-label">Services:</label>
                        @foreach($services as $service)
                            <div>
                                <input type="checkbox" id="service_{{ $service->id }}" name="service_libelle[]" value="{{ $service->id }}" class="form-check-input"
                                {{ in_array($service->id, old('service_libelle', $selectedServices)) ? 'checked' : '' }}>
                                <label for="service_{{ $service->id }}" class="form-check-label">{{ $service->libelle }}</label>
                            </div>
                        @endforeach
                        @error('service_libelle')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('contract') }}'">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
