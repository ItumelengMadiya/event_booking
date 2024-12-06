<?php



namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display a list of all events
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Show a single event
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Organizer: Create an event form
    public function create()
    {
        $this->authorize('create', Event::class); // Ensure only authorized users can access
        $categories = Category::all();
        return view('organizer.events.create', compact('categories'));
    }

    // Organizer: Store a new event
    public function store(Request $request)
    {
        $this->authorize('create', Event::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        Event::create($validated);

        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully!');
    }

    // Organizer: Edit an event form
    public function edit(Event $event)
    {
        $this->authorize('update', $event);

        $categories = Category::all();
        return view('organizer.events.edit', compact('event', 'categories'));
    }

    // Organizer: Update an event
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        $event->update($validated);

        return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully!');
    }

    // Organizer: Delete an event
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully!');
    }
}
