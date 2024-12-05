<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $services= Service::all();
       return view ('Back/service',['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'type' => 'required|string',
        'libelle' => 'required|string',
        'montant' => 'required|numeric', // Ensure montant is a numeric value
    ]);

    // Calculate the total including TVA
    $montant = $validated['montant'];
    $total = $montant + ($montant * 0.2);

    // Merge the calculated total into the validated data
    $validated['taux_tva'] = $total;

    // Create the service with the validated and merged data
    Service::create($validated);

    // Redirect to the service route with a success message
    return redirect()->route('service')->with('message', 'Service créé avec succès');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {


            $service = Service::findOrFail($id);

            return view('Back/Show/showservice', compact('service'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('Back/Edit/editservice', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    // Validate the request data
    $validated = $request->validate([
        'type' => 'required|string',
        'libelle' => 'required|string',
        'montant' => 'required|numeric',
    ]);

    // Calculate the total including TVA
    $montant = $validated['montant'];
    $total = $montant + ($montant * 0.2);

    // Merge the calculated total into the validated data
    $validated['taux_tva'] = $total;

    // Retrieve the service
    $service = Service::findOrFail($id);

    // If the service does not exist, redirect with an error message
    if (!$service) {
        return redirect()->route('service')->with('error', 'Service introuvable');
    }

    // Update the service attributes
    $service->type = $validated['type'];
    $service->libelle = $validated['libelle'];
    $service->montant = $validated['montant'];
    $service->taux_tva = $validated['taux_tva'];

    // Save the changes
    $service->save();

    // Redirect to the service list with a success message
    return redirect()->route('service')->with('message', 'Service mis à jour avec succès');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = service::findOrFail($id);
        $service->delete();
        return redirect()->route('service')->with('success', 'service supprimé avec succès');
    }
}
