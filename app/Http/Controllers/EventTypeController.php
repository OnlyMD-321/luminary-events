<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function index()
    {
        $EventTypes = EventType::all();
        return view('back.EventType.index', compact('EventTypes'));
    }

    public function create()
    {
        return view('back.EventType.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:50',
            'Description' => 'nullable|string',
        ]);

        EventType::create($validatedData);

        return redirect()->route('EventType.index')->with('success', 'Type Event created successfully');
    }

    public function show($id)
    {
        $EventType = EventType::findOrFail($id);
        return view('back.EventType.show', compact('EventType'));
    }

    public function edit($id)
    {
        $EventType = EventType::findOrFail($id);
        return view('back.EventType.edit', compact('EventType'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:50',
            'Description' => 'nullable|string',
        ]);

        $EventType = EventType::findOrFail($id);
        $EventType->update($validatedData);

        return redirect()->route('EventType.index')->with('success', 'Type Event updated successfully');
    }

    public function destroy($id)
    {
        $EventType = EventType::findOrFail($id);
        $EventType->delete();

        return redirect()->route('EventType.index')->with('success', 'Type Event deleted successfully');
    }
}
