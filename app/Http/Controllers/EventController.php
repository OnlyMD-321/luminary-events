<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Venue;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $events = Event::when($search, function ($query, $search) {
            return $query->where('Nom', 'like', "%{$search}%");
        })->get();

        return view('back.event', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        $categories = Category::all();
        $venues = Venue::all();
        return view('back.createevent', compact('categories', 'venues'));
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string',
            'Description' => 'required|string',
            'IDTypeEvent' => 'required|exists:categories,id',
            'IDVenue' => 'required|exists:venues,id',
        ]);

        $event = Event::create([
            'Nom' => $validatedData['Nom'],
            'Description' => $validatedData['Description'],
            'IDTypeEvent' => $validatedData['IDTypeEvent'],
            'IDVenue' => $validatedData['IDVenue'],
        ]);

        if ($request->has('categories')) {
            $event->categories()->sync($request->categories);
        }

        return redirect()->route('event.index')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified event.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('back.showevent', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        $venues = Venue::all();
        $selectedCategories = $event->categories->pluck('id')->toArray(); // Get the IDs of the associated categories

        return view('back.editevent', compact('event', 'categories', 'venues', 'selectedCategories'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'IDTypeEvent' => 'required|exists:categories,id',
            'IDVenue' => 'required|exists:venues,id',
            'categories' => 'array', // Array of category IDs
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        // Update associated categories
        $event->categories()->sync($request->categories);

        return redirect()->route('event.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event deleted successfully!');
    }
}
