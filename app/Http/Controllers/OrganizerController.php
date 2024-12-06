<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        $events = Event::where('organizer_id', auth()->id())->get();
        return view('organizer.dashboard', compact('events'));
    }
    public function index()
    {

        return view('organizer.dashboard');
    }
}
