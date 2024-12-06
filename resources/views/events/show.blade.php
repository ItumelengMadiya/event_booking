@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $event->name }}</h2>
        <p>{{ $event->description }}</p>
        <p><strong>Date:</strong> {{ $event->date }}</p>
        <p><strong>Time:</strong> {{ $event->time }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Price:</strong> ${{ $event->ticket_price }}</p>
        <form method="POST" action="{{ route('booking.store', $event) }}">
            @csrf
            <button type="submit" class="btn btn-success">Book Now</button>
        </form>
    </div>
@endsection
