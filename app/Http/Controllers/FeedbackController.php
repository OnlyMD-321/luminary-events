<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Client;
use App\Models\EventReservation;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of feedback.
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('back.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new feedback.
     */
    public function create()
    {
        $clients = Client::all();
        $eventReservations = EventReservation::all();
        return view('back.feedback.create', compact('clients', 'eventReservations'));
    }

    /**
     * Store a newly created feedback in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IDEventReservation' => 'required|exists:event_reservations,id',
            'IDClient' => 'required|exists:clients,id',
            'Rating' => 'required|numeric|min:1|max:5',
            'Comments' => 'nullable|string',
        ]);

        Feedback::create($validatedData);

        return redirect()->route('feedback.index')->with('success', 'Feedback created successfully!');
    }

    /**
     * Display the specified feedback.
     */
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('back.feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified feedback.
     */
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        $clients = Client::all();
        $eventReservations = EventReservation::all();

        return view('back.feedback.edit', compact('feedback', 'clients', 'eventReservations'));
    }

    /**
     * Update the specified feedback in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'IDEventReservation' => 'required|exists:event_reservations,id',
            'IDClient' => 'required|exists:clients,id',
            'Rating' => 'required|numeric|min:1|max:5',
            'Comments' => 'nullable|string',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update($validatedData);

        return redirect()->route('feedback.index')->with('success', 'Feedback updated successfully!');
    }

    /**
     * Remove the specified feedback from storage.
     */
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully!');
    }
}
