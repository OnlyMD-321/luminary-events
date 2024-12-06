<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of venues.
     */
    public function index()
    {
        $venues = Venue::all();
        return view('back.venue.index', compact('venues'));
    }

    /**
     * Show the form for creating a new venue.
     */
    public function create()
    {
        return view('back.venue.create');
    }

    /**
     * Store a newly created venue in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'Capacity' => 'required|integer',
            'ContactInfo' => 'nullable|string|max:255',
        ]);

        Venue::create($validatedData);

        return redirect()->route('venue.index')->with('success', 'Venue created successfully!');
    }

    /**
     * Display the specified venue.
     */
    public function show($id)
    {
        $venue = Venue::findOrFail($id);
        return view('back.venue.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified venue.
     */
    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('back.venue.edit', compact('venue'));
    }

    /**
     * Update the specified venue in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'Capacity' => 'required|integer',
            'ContactInfo' => 'nullable|string|max:255',
        ]);

        $venue = Venue::findOrFail($id);
        $venue->update($validatedData);

        return redirect()->route('venue.index')->with('success', 'Venue updated successfully!');
    }

    /**
     * Remove the specified venue from storage.
     */
    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();

        return redirect()->route('venue.index')->with('success', 'Venue deleted successfully!');
    }
}
