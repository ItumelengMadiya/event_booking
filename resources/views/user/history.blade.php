@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Bookings</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->event->name }}</td>
                    <td>{{ $booking->event->date }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        @if ($booking->status !== 'Cancelled')
                            <form action="{{ route('booking.cancel', $booking) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
