<x-app-layout>

        <h2 class="font-semibold text-xl">
            {{ __('Client Details') }}
        </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form class="row g-3">
                    @csrf

                    <div class="col-12">
                        <label for="designation" class="form-label">Désignation:</label>
                        <input readonly type="text" id="designation" name="designation" value="{{ old('designation', $client->designation) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email:</label>
                        <input readonly type="email" id="email" name="email" value="{{ old('email', $client->email) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="tel" class="form-label">Téléphone:</label>
                        <input readonly type="tel" id="tel" name="tel" value="{{ old('tel', $client->tel) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="ice" class="form-label">ICE:</label>
                        <input readonly type="text" id="ice" name="ice" value="{{ old('ice', $client->ice) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="if" class="form-label">IF:</label>
                        <input readonly type="text" id="if" name="if" value="{{ old('if', $client->if) }}" required class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="rc" class="form-label">RC:</label>
                        <input readonly type="text" id="rc" name="rc" value="{{ old('rc', $client->rc) }}" required class="form-control">
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="/client" class="btn btn-secondary ms-2">Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
