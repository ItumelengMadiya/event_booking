@extends('layouts.app')

@section('content')
    <h1>Payment for Booking: {{ $booking->event->name }}</h1>

    <form action="{{ route('payment.success') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Pay Now</button>
    </form>

    <a href="{{ route('payment.failure') }}" class="btn btn-danger">Cancel Payment</a>
@endsection
