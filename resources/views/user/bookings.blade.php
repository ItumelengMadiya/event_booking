@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Bookings</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->event->name }}</td>
                    <td>{{ $booking->event->date }}</td>
                    <td>{{ $booking->event->location }}</td>
                    <td>{{ $booking->payment_status }}</td>
                    <td>
                        <form method="POST" action="{{ route('booking.cancel', $booking) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

