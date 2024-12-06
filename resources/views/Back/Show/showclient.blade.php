<x-app-layout>
    <h2 class="font-semibold text-xl mb-4 text-center">
        {{ __('Client Details') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form class="row g-3">
                    @csrf

                    <div class="col-12">
                        <label for="Nom" class="form-label">Nom:</label>
                        <input readonly type="text" id="Nom" name="Nom" value="{{ old('Nom', $client->Nom) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="Prenom" class="form-label">Prénom:</label>
                        <input readonly type="text" id="Prenom" name="Prenom" value="{{ old('Prenom', $client->Prenom) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="Email" class="form-label">Email:</label>
                        <input readonly type="email" id="Email" name="Email" value="{{ old('Email', $client->Email) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="Telephone" class="form-label">Téléphone:</label>
                        <input readonly type="tel" id="Telephone" name="Telephone" value="{{ old('Telephone', $client->Telephone) }}" required class="form-control">
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary ms-2">Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
