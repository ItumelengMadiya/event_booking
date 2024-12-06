@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go back</a>
        <h1>Edit Event</h1>

        <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="date">Event Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $event->date) }}" required>
                @error('date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $event->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
