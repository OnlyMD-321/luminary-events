<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::all();
        return view('back.paiement.index', compact('paiements'));
    }

    public function create()
    {
        return view('back.paiement.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ModePaiement' => 'required|in:Cash,PayPal,Carte',
            'IDEventReservation' => 'required|exists:event_reservations,id',
            'IDUser' => 'required|exists:users,id',
            'PrixTTC' => 'required|numeric',
            'Status' => 'nullable|in:Pending,Successful,Failed',
        ]);

        Paiement::create($validatedData);

        return redirect()->route('paiement.index')->with('success', 'Paiement created successfully');
    }

    public function show($id)
    {
        $paiement = Paiement::findOrFail($id);
        return view('back.paiement.show', compact('paiement'));
    }

    public function edit($id)
    {
        $paiement = Paiement::findOrFail($id);
        return view('back.paiement.edit', compact('paiement'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ModePaiement' => 'required|in:Cash,PayPal,Carte',
            'IDEventReservation' => 'required|exists:event_reservations,id',
            'IDUser' => 'required|exists:users,id',
            'PrixTTC' => 'required|numeric',
            'Status' => 'nullable|in:Pending,Successful,Failed',
        ]);

        $paiement = Paiement::findOrFail($id);
        $paiement->update($validatedData);

        return redirect()->route('paiement.index')->with('success', 'Paiement updated successfully');
    }

    public function destroy($id)
    {
        $paiement = Paiement::findOrFail($id);
        $paiement->delete();

        return redirect()->route('paiement.index')->with('success', 'Paiement deleted successfully');
    }
}
