<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleProfile.css') }}">
    <title>User Profile</title>
</head>
<body>
    <div class="header-container-wrapper">
        <header>
            <div class="header-container">
                <div class="header-left">
                    <h1>User Profile</h1>
                </div>
                <div class="header-right">
                    <a id="logout-btn" href="/logout" class="logout-button">Log out</a>
                </div>
            </div>
        </header>
    </div>
    
    <div class="container">
        <h2>Welcome, {{ $user->name }}</h2>
        <h3>Your Bookings:</h3>
        <div class="bookings-list">
            @foreach($bookings as $booking)
                <div class="booking-card">
                    <h4>{{ $booking->hotel->name }}</h4>
                    <p>Check-In: {{ $booking->check_in }}</p>
                    <p>Check-Out: {{ $booking->check_out }}</p>
                    <p>Total Price: ${{ $booking->total_price }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
