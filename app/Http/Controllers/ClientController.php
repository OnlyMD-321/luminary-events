<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $clients = Client::when($search, function ($query, $search) {
            return $query->where('Nom', 'like', "%{$search}%")
                         ->orWhere('Prenom', 'like', "%{$search}%");
        })->get();

        return view('back.client', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.createclient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string',
            'Prenom' => 'required|string',
            'Email' => 'required|email',
            'Telephone' => 'required|string|min:10',
        ]);

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('back.showclient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('back.editclient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'Telephone' => 'required|string|max:255',
        ]);

        $client = Client::findOrFail($id);
        $client->update($validatedData);

        return redirect()->route('clients.index')->with('message', 'Client mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès');
    }
}
