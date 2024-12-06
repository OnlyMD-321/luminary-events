<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Edit Event') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('event.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12 mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" id="Nom" name="Nom" class="form-control" value="{{ $event->Nom }}" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea id="Description" name="Description" class="form-control" required>{{ $event->Description }}</textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="IDVenue" class="form-label">Venue</label>
                        <select id="IDVenue" name="IDVenue" class="form-control" required>
                            @foreach($venues as $venue)
                                <option value="{{ $venue->id }}" @if($venue->id == $event->IDVenue) selected @endif>
                                    {{ $venue->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <select id="categories" name="categories[]" class="form-control" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(in_array($category->id, $selectedCategories)) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
