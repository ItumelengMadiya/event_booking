@extends('layouts.user')

@section('content')
    <h1>Your Bookings</h1>

    @if ($bookings->isEmpty())
        <p>You have no bookings yet.</p>
        <a href="{{ route('events.index') }}">Browse Events</a>
    @else
        <table>
            <thead>
            <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Seats</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->event->name }}</td>
                    <td>{{ $booking->event->date }}</td>
                    <td>{{ $booking->seats }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        @if ($booking->status === 'confirmed')
                            <form action="{{ route('booking.cancel', $booking->id) }}" method="POST">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    Cancel
                                </button>
                            </form>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
