@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $userCount }}</h2>
                        <p>Users</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>{{ $eventCount }}</h2>
                        <p>Events</p>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-primary">Manage Events</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
