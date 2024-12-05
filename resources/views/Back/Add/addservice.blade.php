<x-app-layout>
    <h2 class="font-semibold text-xl">
        {{ __('Add New Service') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('service.create') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="type" class="form-label">Type:</label>
                        <input type="text" id="type" name="type" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="libelle" class="form-label">Libelle:</label>
                        <input type="text" id="libelle" name="libelle" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="montant" class="form-label">Montant:</label>
                        <input type="text" id="montant" name="montant" required class="form-control">
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary" value="Ajouter">
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('service') }}'">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
