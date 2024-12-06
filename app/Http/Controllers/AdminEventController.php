<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
public function index()
{
$events = Event::all();
return view('admin.events.index', compact('events'));
}

public function create()
{
$categories = Category::all();
return view('admin.events.create', compact('categories'));
}

public function store(Request $request)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
'date' => 'required|date',
'category_id' => 'required|exists:categories,id',
], [
'name.required' => 'Event name is required.',
'date.required' => 'Event date is required.',
'category_id.required' => 'Category selection is required.',
]);

Event::create($validated);
return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
}

public function edit(Event $event)
{
$categories = Category::all();
return view('admin.events.edit', compact('event', 'categories'));
}

public function update(Request $request, Event $event)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
'date' => 'required|date',
'category_id' => 'required|exists:categories,id',
], [
'name.required' => 'Event name is required.',
'date.required' => 'Event date is required.',
'category_id.required' => 'Category selection is required.',
]);

$event->update($validated);
return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
}

public function destroy(Event $event)
{
$event->delete();
return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
}
}
