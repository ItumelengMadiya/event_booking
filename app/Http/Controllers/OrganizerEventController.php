<?php



namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerEventController extends Controller
{
    public function index()
    {
        $events = Event::where('organizer_id', auth()->id())->get();
        return view('organizer.events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('organizer.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'category_id' => 'required|exists:categories,id',
            'max_attendees' => 'required|integer',
            'ticket_price' => 'required|numeric',
        ]);

        $data['organizer_id'] = auth()->id();

        Event::create($data);

        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {

        $event = Event::findOrFail($id);

        $categories = Category::all();

        return view('organizer.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'date' => 'date',
            'time' => 'string',
            'location' => 'string',
            'category_id' => 'exists:categories,id',
            'max_attendees' => 'integer',
            'ticket_price' => 'numeric',
        ]);

        $event->update($data);

        return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully.');
    }
}
