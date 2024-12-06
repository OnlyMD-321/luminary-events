<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Create Event') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('event.store') }}" method="POST">
                    @csrf

                    <div class="col-12 mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" id="Nom" name="Nom" class="form-control" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea id="Description" name="Description" class="form-control" required></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="IDVenue" class="form-label">Venue</label>
                        <select id="IDVenue" name="IDVenue" class="form-control" required>
                            @foreach($venues as $venue)
                                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <select id="categories" name="categories[]" class="form-control" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
