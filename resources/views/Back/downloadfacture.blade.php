<x-app-layout>
    <h2 class="font-semibold text-xl">
        {{ __('Facture') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <img src="{{ url('./assets/img/logo light.png') }}" alt="Logo de l'entreprise" style="max-width: 200px; margin-bottom: 20px;">
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="fw-bold">Numéro de Facture: {{ $facture->numero_facture }}</div>
                                <div class="fw-bold">Date: {{ $facture->date_facture }}</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="fw-bold">Nom de client: {{ $facture->nom_client }}</div>
                                <div class="fw-bold">Tel: {{ $facture->client->tel }}</div> <!-- Assuming the phone number property is 'tel' in your Client model -->
                                <div class="fw-bold">Email: {{ $facture->client->email }}</div> <!-- Assuming the email property is 'email' in your Client model -->
                            </div>
                        </div>
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>PU</th>
                                    <th>Qte</th>
                                    <th>Prix HTVA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->libelle }}</td>
                                        <td>{{ $service->montant }}</td>
                                        <td>1</td> <!-- Assuming quantity is always 1, adjust as needed -->
                                        <td>{{ $service->montant }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Total HTVA</td>
                                    <td>{{ $services->sum('montant') }}</td>
                                </tr>
                                <tr>
                                    <td>TVA (20%)</td>
                                    <td>{{ $services->sum('montant') * 0.20 }}</td>
                                </tr>
                                <tr>
                                    <td>Total TTC</td>
                                    <td>{{ $services->sum('montant') * 1.20 }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('stripe.test') }}" method="POST">
                                @csrf
                                <input type="hidden" name="facture" value="{{ json_encode($facture) }}">
                                <input type="hidden" name="services" value="{{ json_encode($services) }}">
                                <button type="submit" class="btn btn-primary">Pay Now</button>
                            </form>
                            <a href="{{ route('pdfdownload', ['id' => $facture->id]) }}" class="btn btn-success">Download PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
