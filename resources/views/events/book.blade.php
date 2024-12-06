@extends('layouts.user')

@section('content')
    <h1>Book Event</h1>

    <h2>{{ $event->name }}</h2>
    <p>Date: {{ $event->date }}</p>
    <p>Category: {{ $event->category->name }}</p>
    <p>Description: {{ $event->description }}</p>

    <form action="{{ route('booking.store', $event->id) }}" method="POST">
        @csrf
        <label for="seats">Number of Seats:</label>
        <input type="number" name="seats" id="seats" required min="1">
        <br>
        <button type="submit">Confirm Booking</button>
    </form>

    <a href="{{ route('events.index') }}">Back to Events</a>
@endsection
