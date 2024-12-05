<?php

namespace App\Http\Controllers;

use App\Models\client;
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
        return $query->where('designation', 'like', "%{$search}%");
    })->get();

    return view('back.client', compact('clients'));
}

    /**
     * Show the form for creating a new resource.
     */


     public function create(Request $request)
     {
         $validatedData = $request->validate([
             'designation' => 'required|string',
             'email' => 'required|email',
             'tel' => 'required|string|min:10',
             'ice' => 'required|string|max:15', // Limitez la longueur à 15 caractères
             'if' => 'required|string',
             'rc' => 'required|string',
         ]);

         // Ajouter des zéros à gauche si la longueur de l'ICE est inférieure à 15
         $ice = str_pad($validatedData['ice'], 15, '0', STR_PAD_LEFT);
         $validatedData['ice'] = $ice;

         Client::create($validatedData);

         return redirect()->route('client')->with('success', 'Client créé avec succès!');
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


            $client = Client::findOrFail($id);

            return view('Back/Show/showclient', compact('client'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('Back/Edit/editclient', compact('client'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'email' => 'required|email|max:255', // Add validation for email
            'tel' => 'required|string|max:255',
            'ice' => 'required|string|max:255',
            'if' => 'required|string|max:255',
            'rc' => 'required|string|max:255',
        ]);

        $client = Client::findOrFail($id);

        if (!$client) {
            return redirect()->route('client')->with('error', 'Client introuvable');
        }

        $client->designation = $request->input('designation');
        $client->email = $request->input('email');
        $client->tel = $request->input('tel');
        $client->ice = $request->input('ice');
        $client->if = $request->input('if');
        $client->rc = $request->input('rc');

        $client->save();

        return redirect()->route('client')->with('message', 'Client mis à jour avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */

        public function destroy($id)
{
       $client = Client::findOrFail($id);




    $client->delete();


    return redirect()->route('client')->with('success', 'Client supprimé avec succès');
}

    }
