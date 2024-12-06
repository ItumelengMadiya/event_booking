@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <p>{{ __('You are logged in!') }}</p>

                            <div class="d-flex justify-content-between mt-4">

                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                                    {{ __('Admin Dashboard') }}
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">
                                        {{ __('User Dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('organizer.dashboard') }}" class="btn btn-success">
                                        {{ __('Organizer Dashboard') }}
                                    </a>
                                </li>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


