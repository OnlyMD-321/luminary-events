<?php

namespace App\Http\Controllers;

use App\Models\EventReservation;
use App\Models\Client;
use App\Models\Event;
use App\Models\Feedback;
use Illuminate\Http\Request;

class EventReservationController extends Controller
{
    /**
     * Display a listing of event reservations.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $eventReservations = EventReservation::when($search, function ($query, $search) {
            return $query->where('IDEvent', 'like', "%{$search}%");
        })->get();

        return view('back.eventreservation.index', compact('eventReservations'));
    }

    /**
     * Show the form for creating a new event reservation.
     */
    public function create()
    {
        $clients = Client::all();
        $events = Event::all();

        return view('back.eventreservation.create', compact('clients', 'events'));
    }

    /**
     * Store a newly created event reservation in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IDClient' => 'required|exists:clients,id',
            'IDEvent' => 'required|exists:events,id',
            'DateReservation' => 'required|date',
            'NombreSeats' => 'required|numeric|min:1',
        ]);

        EventReservation::create($validatedData);

        return redirect()->route('eventreservation.index')->with('success', 'Event reservation created successfully!');
    }

    /**
     * Display the specified event reservation.
     */
    public function show($id)
    {
        $eventReservation = EventReservation::findOrFail($id);

        return view('back.eventreservation.show', compact('eventReservation'));
    }

    /**
     * Show the form for editing the specified event reservation.
     */
    public function edit($id)
    {
        $eventReservation = EventReservation::findOrFail($id);
        $clients = Client::all();
        $events = Event::all();

        return view('back.eventreservation.edit', compact('eventReservation', 'clients', 'events'));
    }

    /**
     * Update the specified event reservation in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'IDClient' => 'required|exists:clients,id',
            'IDEvent' => 'required|exists:events,id',
            'DateReservation' => 'required|date',
            'NombreSeats' => 'required|numeric|min:1',
        ]);

        $eventReservation = EventReservation::findOrFail($id);
        $eventReservation->update($validatedData);

        return redirect()->route('eventreservation.index')->with('success', 'Event reservation updated successfully!');
    }

    /**
     * Remove the specified event reservation from storage.
     */
    public function destroy($id)
    {
        $eventReservation = EventReservation::findOrFail($id);
        $eventReservation->delete();

        return redirect()->route('eventreservation.index')->with('success', 'Event reservation deleted successfully!');
    }
}
