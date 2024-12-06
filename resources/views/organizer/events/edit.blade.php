@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('organizer.dashboard') }}" class="btn btn-primary">Go back</a>
        <h1>Edit Event: {{ $event->name }}</h1>
        <form action="{{ route('organizer.events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" class="form-control" name="name" value="{{ $event->name }}" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Event Date</label>
                <input type="date" class="form-control" name="date" value="{{ $event->date }}" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $event->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Event</button>
        </form>
    </div>
@endsection
