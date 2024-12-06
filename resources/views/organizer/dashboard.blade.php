@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Organizer Dashboard</h1>

        <ul class="list-unstyled">
            <li>
                <a href="{{ route('organizer.events.create') }}" class="btn btn-primary w-100">Create New Event</a>
            </li>
            <li class="mt-3">
                <a href="{{ route('organizer.events.index') }}" class="btn btn-secondary w-100">View All Events</a>
            </li>
        </ul>


    </div>
@endsection

