<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Search Results</title>
</head>
<body>
    <header>
        <h1>Search Results</h1>
    </header>
    
    <div class="container">
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
