<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Create Event Type') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('EventType.store') }}" method="POST">
                    @csrf

                    <div class="col-12 mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" id="Name" name="Name" class="form-control" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea id="Description" name="Description" class="form-control"></textarea>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Create Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
