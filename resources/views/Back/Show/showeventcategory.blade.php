<x-app-layout>
    <h2 class="font-semibold text-xl mb-4 text-center">{{ __('Event Category Details') }}</h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="event" class="form-label">Event:</label>
                        <input readonly type="text" id="event" value="{{ $eventCategory->event->name }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category:</label>
                        <input readonly type="text" id="category" value="{{ $eventCategory->category->name }}" class="form-control">
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <a href="{{ route('eventcategory.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
