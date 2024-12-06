@extends('layouts.user')

@section('content')
    <h1>Cancel Booking</h1>

    <h2>Are you sure you want to cancel your booking for:</h2>
    <p>Event: {{ $booking->event->name }}</p>
    <p>Date: {{ $booking->event->date }}</p>
    <p>Seats: {{ $booking->seats }}</p>

    <form action="{{ route('booking.cancel', $booking->id) }}" method="POST">
        @csrf
        <button type="submit">Yes, Cancel Booking</button>
    </form>

    <a href="{{ route('user.bookings') }}">No, Go Back</a>
@endsection
