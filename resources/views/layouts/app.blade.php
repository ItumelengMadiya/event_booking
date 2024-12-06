

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Header or Navbar -->
    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
        <h1>Event Booking</h1>
        <!-- Logout Button -->
        @if (Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endif
    </div>
    <!-- Main Content -->
    @yield('content')
</div>
</body>
</html>

