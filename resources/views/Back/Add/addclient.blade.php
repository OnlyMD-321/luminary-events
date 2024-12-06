<x-app-layout>
    <h2 class="font-semibold text-xl mb-4 text-center">{{ __('Add Client') }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger text-center mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="Nom" class="block text-gray-700 font-bold mb-2">Nom:</label>
                <input type="text" name="Nom" id="Nom" class="form-control" value="{{ old('Nom') }}" required>
            </div>

            <div class="mb-4">
                <label for="Prenom" class="block text-gray-700 font-bold mb-2">Prénom:</label>
                <input type="text" name="Prenom" id="Prenom" class="form-control" value="{{ old('Prenom') }}" required>
            </div>

            <div class="mb-4">
                <label for="Email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email') }}" required>
            </div>

            <div class="mb-4">
                <label for="Telephone" class="block text-gray-700 font-bold mb-2">Téléphone:</label>
                <input type="text" name="Telephone" id="Telephone" class="form-control" value="{{ old('Telephone') }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Client</button>
            </div>
        </form>
    </div>
</x-app-layout>
