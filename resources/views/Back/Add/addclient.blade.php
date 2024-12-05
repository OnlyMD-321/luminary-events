<x-app-layout>

        <h2 class="font-semibold text-xl ">
            {{ __('Add New Client') }}
        </h2>


    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('client.create') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="designation" class="form-label">Designation:</label>
                        <input type="text" id="designation" name="designation" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="tel" class="form-label">Phone:</label>
                        <input type="text" id="tel" name="tel" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="ice" class="form-label">ICE:</label>
                        <input type="text" id="ice" name="ice" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="if" class="form-label">IF:</label>
                        <input type="text" id="if" name="if" required class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="rc" class="form-label">RC:</label>
                        <input type="text" id="rc" name="rc" required class="form-control">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary ms-2" onclick="window.location.href = '{{ route('client') }}'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
