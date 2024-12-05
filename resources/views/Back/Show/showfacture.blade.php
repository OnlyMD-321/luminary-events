<x-app-layout>
        <h2 class="font-semibold text-xl">
            {{ __('Details Facture') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tr>
                            <td class="px-4 py-2 font-semibold">Numéro de Facture:</td>
                            <td class="px-4 py-2">{{ $facture->numero_facture }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-semibold">Nom du Client:</td>
                            <td class="px-4 py-2">{{ $facture->nom_client }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-semibold">Date de Facturation:</td>
                            <td class="px-4 py-2">{{ $facture->date_facture }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-semibold">Montant Total:</td>
                            <td class="px-4 py-2">{{ $facture->montant_total }}</td>
                        </tr>
                    </table>
                </div>
                <div class="p-6 bg-white border-t border-gray-200 text-right">
                    <a href="/facture" class="inline-block px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded">Retour</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
