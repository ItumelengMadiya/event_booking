@extends('layouts.app') <!-- Ensure layout is valid -->

@section('content')
    <div class="container">
        <a href="{{ route('organizer.dashboard') }}" class="btn btn-primary">Go back</a>
        <h1>Create Event</h1>

        <form method="POST" action="{{ route('organizer.events.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>


            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>


            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>


            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>


            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>


            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="max_attendees">Max Attendees</label>
                <input type="number" class="form-control" id="max_attendees" name="max_attendees" required>
            </div>


            <div class="form-group">
                <label for="ticket_price">Ticket Price</label>
                <input type="number" class="form-control" id="ticket_price" name="ticket_price" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
@endsection
