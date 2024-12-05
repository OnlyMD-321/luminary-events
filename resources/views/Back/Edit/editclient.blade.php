<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Client') }}
        </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('client.update', $client->id) }}" method="post" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label for="designation" class="form-label">Désignation:</label>
                        <input type="text" id="designation" name="designation" value="{{ old('designation', $client->designation) }}" required class="form-control">
                        @error('designation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $client->email) }}" required class="form-control">
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="tel" class="form-label">Téléphone:</label>
                        <input type="tel" id="tel" name="tel" value="{{ old('tel', $client->tel) }}" required class="form-control">
                        @error('tel')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="ice" class="form-label">ICE:</label>
                        <input type="text" id="ice" name="ice" value="{{ old('ice', $client->ice) }}" required class="form-control">
                        @error('ice')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="if" class="form-label">IF:</label>
                        <input type="text" id="if" name="if" value="{{ old('if', $client->if) }}" required class="form-control">
                        @error('if')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="rc" class="form-label">RC:</label>
                        <input type="text" id="rc" name="rc" value="{{ old('rc', $client->rc) }}" required class="form-control">
                        @error('rc')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('client') }}'">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
