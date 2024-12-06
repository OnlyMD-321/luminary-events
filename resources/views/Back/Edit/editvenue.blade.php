<x-app-layout>

    <h2 class="font-semibold text-xl">
        {{ __('Edit Venue') }}
    </h2>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('venue.update', $venue->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Name">Venue Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" value="{{ $venue->Name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" value="{{ $venue->Address }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Capacity">Capacity</label>
                        <input type="number" class="form-control" id="Capacity" name="Capacity" value="{{ $venue->Capacity }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ContactInfo">Contact Info</label>
                        <input type="text" class="form-control" id="ContactInfo" name="ContactInfo" value="{{ $venue->ContactInfo }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
