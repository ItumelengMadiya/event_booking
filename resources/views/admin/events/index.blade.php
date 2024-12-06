@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go back</a>
        <h1>Manage Events</h1>


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
