<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Edit Event Type') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('EventType.update', $EventType->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12 mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" id="Name" name="Name" class="form-control" value="{{ $EventType->Name }}" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea id="Description" name="Description" class="form-control">{{ $EventType->Description }}</textarea>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
