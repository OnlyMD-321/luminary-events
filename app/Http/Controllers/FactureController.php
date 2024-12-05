<?php

namespace App\Http\Controllers;

use App\Models\facture;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $search = $request->query('search');
    $factures = Facture::when($search, function ($query, $search) {
        return $query->where('nom_client', 'like', "%{$search}%");
    })->get();

    return view('back.facture', compact('factures'));
}



 public function generate(Request $request, $id)
    {
        // Retrieve the Facture model along with related client and contract services
        $facture = Facture::with(['client', 'contract.services'])->findOrFail($id);

        // Collect all services related to the contract of the facture
        $services = $facture->contract->services;

        $data = compact('facture', 'services');

        // Determine the CSS file path
        if ($request->has('preview')) {
            $data['css'] = asset('/css/app.css');
            return view('downloadfacture', $data);
        } else {
            $data['css'] = public_path('/css/app.css');
        }

        // Generate the PDF with the view and data
        $pdf = Pdf::loadView('downloadfacture', $data);

        // Option 1) Show the PDF in the browser
        return $pdf->stream();

        // Option 2) Download the PDF
        // return $pdf->download('invoice.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    /*public function create(Request $request)
    {
        $validatedData = $request->validate([
            'numero_facture' => 'required|string',
            'nom_client' => 'required|string',
            'date_facture' => 'required|string',
            'montant_total' => 'required|string',
            'service_id' => 'required|exists:services,id',
        ]);

        Facture::create($validatedData);

        return redirect()->route('facture')->with('success', 'Facture créé avec succès!');
    }
*/
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
    $facture = Facture::with(['client', 'contract.services'])->findOrFail($id);

    // Collect all services related to the contract of the facture
    $services = $facture->contract->services;

    return view('back.downloadfacture', compact('facture', 'services'));
}





    /**
     * Show the form for editing the specified resource.
     */



//        public function downloadpdf($id){
//         $facture = facture::findOrFail($id);
//         $pdf = Pdf::loadView('downloadfacture',compact('facture'));
//        return $pdf->download('downloadfacture.pdf');
//    }



    /**
     * Update the specified resource in storage.
     */
    /*public function update(Request $request, $id)
    {

        $request->validate([
            'numero_facture' => 'required|string|max:255',
            'nom_client' => 'required|string|max:255',
            'date_facture' => 'required|date',
            'montant_total' => 'required|string|max:255',

        ]);

        // Récupération du facture
        $facture = Facture::findOrFail($id);

        // Si le facture n'existe pas, redirection avec message d'erreur
        if (!$facture) {
            return redirect()->route('facture')->with('error', 'Facture introuvable');
        }

        // Mise à jour des attributs du facture
        $facture->numero_facture = $request->input('numero_facture');
        $facture->nom_client = $request->input('nom_client');
        $facture->date_facture = $request->input('date_facture');
        $facture->montant_total = $request->input('montant_total');

        // Enregistrement des modifications
        $facture->save();

        // Redirection vers la liste des factures avec message de succès
        return redirect()->route('facture')->with('message', 'Facture mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
           $facture = Facture::findOrFail($id);




        $facture->delete();


        return redirect()->route('facture')->with('success', 'Facture supprimé avec succès');
    }
}
