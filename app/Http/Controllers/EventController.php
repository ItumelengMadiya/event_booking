<?php



namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    
    public function create()
    {
        $this->authorize('create', Event::class); 
        $categories = Category::all();
        return view('organizer.events.create', compact('categories'));
    }

    
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

    
    public function edit(Event $event)
    {
        $this->authorize('update', $event);

        $categories = Category::all();
        return view('organizer.events.edit', compact('event', 'categories'));
    }

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

    
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully!');
    }
}
