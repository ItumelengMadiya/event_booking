@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('organizer.dashboard') }}" class="btn btn-primary">Go back</a>
        <h2>Your Events</h2>
        <a href="{{ route('organizer.events.create') }}" class="btn btn-primary mb-3">Create Event</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ route('organizer.events.edit', $event) }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ route('organizer.events.destroy', $event) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
