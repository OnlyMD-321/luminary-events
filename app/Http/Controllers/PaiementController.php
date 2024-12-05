<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\facture;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paiements = Paiement::all();

        return view('Back/paiement', compact('paiements'));
    }


    /**
     * Show the form for creating a new resource.
     */

public function create(Request $request)
{
    $validated = $request->validate([
        'date' => 'required|date',
        'periode' => 'required|string|max:255',
        'annee' => 'required|numeric',
        'facture_id' => 'required|exists:factures,id',
    ]);

    // Get the montant_total from the selected facture
    $facture = Facture::findOrFail($validated['facture_id']);
    $validated['montant_total'] = $facture->montant_total;

    Paiement::create($validated);

    return redirect()->route('paiement')->with('message', 'Paiement créé avec succès');
}
public function showAddPaiementForm()
{
    $factures = Facture::all();
    return view('back.add.addpaiement', compact('factures'));
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


            $paiement = paiement::findOrFail($id);

            return view('Back/Show/showpaiement', compact('paiement'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paiement = paiement::findOrFail($id);

        return view('Back/Edit/editpaiement', compact('paiement'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {

        $request->validate([
            'date' => 'required|date',
            'periode' => 'required|string',
            'annee' => 'required|numeric',
            'montant_total' => 'required|numeric',

        ]);

        // Récupération du contrat
        $paiement = paiement::findOrFail($id);

        // Si le contrat n'existe pas, redirection avec message d'erreur
        if (!$paiement) {
            return redirect()->route('paiement')->with('error', 'Contrat introuvable');
        }

        // Mise à jour des attributs du contrat
        $paiement->date = $request->input('date');
        $paiement->periode = $request->input('periode');
        $paiement->annee = $request->input('annee');
        $paiement->montant_total = $request->input('montant_total');

        // Enregistrement des modifications
        $paiement->save();

        // Redirection vers la liste des contrats avec message de succès
        return redirect()->route('paiement')->with('message', 'Paiement mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
           $paiement = paiement::findOrFail($id);




        $paiement->delete();


        return redirect()->route('paiement')->with('success', 'paiement supprimé avec succès');
    }
}
