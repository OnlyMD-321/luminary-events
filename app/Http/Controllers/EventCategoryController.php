<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the event categories.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $eventCategories = EventCategory::when($search, function ($query, $search) {
            return $query->where('event_id', 'like', "%{$search}%");
        })->get();

        return view('back.eventcategory.index', compact('eventCategories'));
    }

    /**
     * Show the form for creating a new event category.
     */
    public function create()
    {
        $events = Event::all();
        $categories = Category::all();

        return view('back.eventcategory.create', compact('events', 'categories'));
    }

    /**
     * Store a newly created event category in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        EventCategory::create($validatedData);

        return redirect()->route('eventcategory.index')->with('success', 'Event Category created successfully!');
    }

    /**
     * Display the specified event category.
     */
    public function show($id)
    {
        $eventCategory = EventCategory::findOrFail($id);

        return view('back.eventcategory.show', compact('eventCategory'));
    }

    /**
     * Show the form for editing the specified event category.
     */
    public function edit($id)
    {
        $eventCategory = EventCategory::findOrFail($id);
        $events = Event::all();
        $categories = Category::all();

        return view('back.eventcategory.edit', compact('eventCategory', 'events', 'categories'));
    }

    /**
     * Update the specified event category in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $eventCategory = EventCategory::findOrFail($id);
        $eventCategory->update($validatedData);

        return redirect()->route('eventcategory.index')->with('success', 'Event Category updated successfully!');
    }

    /**
     * Remove the specified event category from storage.
     */
    public function destroy($id)
    {
        $eventCategory = EventCategory::findOrFail($id);
        $eventCategory->delete();

        return redirect()->route('eventcategory.index')->with('success', 'Event Category deleted successfully!');
    }
}
