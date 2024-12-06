@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        <p>Welcome, {{ Auth::user()->name }}! This is your dashboard.</p>

                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('events.index') }}" class="btn btn-primary w-100">Viewing events</a>
                            </li>

                        </ul>


                        <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                            {{ __('Go Back to Home') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
