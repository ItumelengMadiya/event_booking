@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Upcoming Events</h2>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $event->image }}" class="card-img-top" alt="{{ $event->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
