<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Hotel Booking Website</title>
</head>
<body>
    <header>
        <h1>Hotel Booking Website</h1>
    </header>
    
    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <h1>Welcome to Our Hotel Booking Website</h1>
            <p>Find the best hotels and book your stay</p>
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="location" placeholder="Enter your destination">
                <input type="date" name="checkin" placeholder="Check-in">
                <input type="date" name="checkout" placeholder="Check-out">
                <button type="submit">Search</button>
            </form>
        </div>
        
        <!-- Available Hotels -->
        <main>
            <h2>Available Hotels</h2>
            <div class="hotels">
                @foreach($hotels as $hotel)
                    <div class="hotel-card">
                        <img src="{{ $hotel->image_url }}" alt="{{ $hotel->name }}">
                        <h3>{{ $hotel->name }}</h3>
                        <p>{{ $hotel->description }}</p>
                        <button onclick="<?php echo 'bookHotel(' . $hotel->id . ')'; ?>">Book Now</button>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
    
    <script>
        function bookHotel(hotelId) {
            alert('Booking hotel with ID: ' + hotelId);
            // Add your booking logic here
        }
    </script>
</body>
</html>
