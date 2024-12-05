<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\facture;
use App\Models\client;
use App\Models\servicecontract;
use App\Models\service;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resousignatairee.
     */


public function index(Request $request)
{
    $search = $request->query('search');
    $contracts = Contract::when($search, function ($query, $search) {
        return $query->where('numero_contrat', 'like', "%{$search}%");
    })->get();

    return view('back.contract', compact('contracts'));
}




    /**
     * Show the form for creating a new resousignatairee.
     */

public function create(Request $request)
{
    // Validate the contract data
    $contractData = $request->validate([
        'numero_contrat' => 'required|numeric',
        'date_signature' => 'required|date',
        'date_effet' => 'required|date',
        'type_contrat' => 'required|string',
        'mode_reglement' => 'required|string',
        'signataire' => 'required|string',
        'client_id' => 'required|exists:clients,id',
        'service_libelle' => 'array', // Validating the services array
    ]);

    // Create the contract
    $contract = Contract::create([
        'numero_contrat' => $contractData['numero_contrat'],
        'date_signature' => $contractData['date_signature'],
        'date_effet' => $contractData['date_effet'],
        'type_contrat' => $contractData['type_contrat'],
        'mode_reglement' => $contractData['mode_reglement'],
        'signataire' => $contractData['signataire'],
        'client_id' => $contractData['client_id'],
    ]);

    $totalAmount = 0;

    // Create the service contracts and calculate the total amount
    if (isset($contractData['service_libelle'])) {
        foreach ($contractData['service_libelle'] as $serviceLibelle) {
            $service = Service::firstOrCreate(['libelle' => $serviceLibelle]);
            ServiceContract::create([
                'service_id' => $service->id,
                'contract_id' => $contract->id,
            ]);

            // Sum up the amounts of the selected services
            $totalAmount += $service->taux_tva;
        }
    }

    // Generate the invoice number
    $numeroFacture = uniqid();

    // Create the invoice
    $facture = Facture::create([
        'numero_facture' => $numeroFacture,
        'nom_client' => Client::find($contractData['client_id'])->designation,
        'date_facture' => now(),
        'montant_total' => $totalAmount,
        'contract_id' => $contract->id,
        'client_id' => $contractData['client_id'],
    ]);

    // Redirect with a success message
    return redirect()->route('contract')->with('success', 'Contrat créé et facture générée avec succès!');
}



     //Show function

     public function show($id)
     {


             $contract = Contract::findOrFail($id);

             return view('Back/Show/showcontract', compact('contract'));


     }

     /**
      * Show the form for editing the specmode_reglementied resousignatairee.
      */
  public function edit($id)
{
    $contract = Contract::findOrFail($id);
    $selectedServices = $contract->services()->pluck('services.id')->toArray(); // Specify the table for the id column
    $services = Service::all();

    return view('Back/Edit/editcontract', compact('contract', 'services', 'selectedServices'));
}



     /**
      * Update the specmode_reglementied resousignatairee in storage.
      */
public function update(Request $request, $id)
{
    $request->validate([
        'numero_contrat' => 'required|string|max:255',
        'date_signature' => 'required|date',
        'date_effet' => 'required|string|max:255',
        'type_contrat' => 'required|string|max:255',
        'mode_reglement' => 'required|string|max:255',
        'signataire' => 'required|string|max:255',
        'service_libelle' => 'array', // Validate the services array
    ]);

    $contract = Contract::findOrFail($id);

    if (!$contract) {
        return redirect()->route('contract')->with('error', 'Contrat introuvable');
    }

    $contract->update([
        'numero_contrat' => $request->input('numero_contrat'),
        'date_signature' => $request->input('date_signature'),
        'date_effet' => $request->input('date_effet'),
        'type_contrat' => $request->input('type_contrat'),
        'mode_reglement' => $request->input('mode_reglement'),
        'signataire' => $request->input('signataire'),
    ]);

    // Update services
    $selectedServices = $request->input('service_libelle', []);
    $contract->services()->sync($selectedServices);

    // Calculate the total amount based on the selected services
    $totalAmount = Service::whereIn('id', $selectedServices)->sum('taux_tva');

    // Update the associated Facture record
    $facture = $contract->facture;
    if ($facture) {
        $facture->update(['montant_total' => $totalAmount]);
    }

    return redirect()->route('contract')->with('message', 'Contrat mis à jour avec succès');
}


     /**
      * Remove the specmode_reglementied resousignatairee from storage.
      */
     public function destroy($id)
     {
            $contract = Contract::findOrFail($id);




         $contract->delete();


         return redirect()->route('contract')->with('success', 'Contract supprimé avec succès');
     }
 }
