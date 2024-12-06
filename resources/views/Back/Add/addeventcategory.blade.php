<x-app-layout>
    <h2 class="font-semibold text-xl mb-4 text-center">{{ __('Add Event Category') }}</h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('eventcategory.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="event" class="form-label">Event:</label>
                            <select id="event" name="event_id" class="form-control" required>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category:</label>
                            <select id="category" name="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('eventcategory.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
