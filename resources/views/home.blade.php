<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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
=======
    <link rel="stylesheet" href="{{ asset('css/styleHome.css') }}">
    <title>Hotel Booking Website</title>
</head>
<body>
    <div class="header-container-wrapper">
        <header>
            <div class="header-container">
                <div class="header-left">
                    <h1>Hotel Booking Website</h1>
                </div>
                <div class="header-right">
                    <button id="login-btn">Log in</button>
                    <select id="language-select">
                        <option value="en">English</option>
                        <option value="lv">Latviešu</option>
                        <!-- Add more languages as needed -->
                    </select>
                </div>
            </div>
        </header>
    </div>
    
    <div class="container">
        <!-- Search Section -->
        <div class="search-section">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="keywords" placeholder="Search hotels...">
>>>>>>> ce343f9 (Temp changes)
                <button type="submit">Search</button>
            </form>
        </div>
        
<<<<<<< HEAD
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
=======
        <!-- Main Content: Filters, Listings, and Recommendations -->
        <div class="main-content">
            <!-- Filters Section -->
            <aside class="filters">
                <h2>Filters</h2>
                <div class="filter-card">
                    <h3>Price</h3>
                    <input type="range" min="0" max="1000" step="50">
                </div>
                <div class="filter-card">
                    <h3>Rating</h3>
                    <input type="range" min="0" max="5" step="0.5">
                </div>
                <div class="filter-card">
                    <h3>Type of Beds</h3>
                    <label><input type="checkbox" name="bed_type" value="queen"> Queen Sized</label>
                    <label><input type="checkbox" name="bed_type" value="king"> King Sized</label>
                    <label><input type="checkbox" name="bed_type" value="twin"> Twin</label>
                </div>
                <div class="filter-card">
                    <h3>Breakfast</h3>
                    <label><input type="checkbox" name="breakfast" value="included"> Included</label>
                    <label><input type="checkbox" name="breakfast" value="not_included"> Not Included</label>
                </div>
            </aside>
            
            <!-- Main Listings Section -->
            <main class="listings">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div>
                <div class="hotel-list">
                    @foreach($hotels as $hotel)
                        <div class="hotel-card">
                            <img src="{{ $hotel->image_url }}" alt="{{ $hotel->name }}">
                            <h3>{{ $hotel->name }}</h3>
                            <p>{{ $hotel->location }}</p>
                            <p>{{ $hotel->price_per_night }} per night</p>
                            <button class="book-now-btn" data-hotel-id="{{ $hotel->id }}">Book Now</button>
                        </div>
                    @endforeach
                </div>
            </main>
            
            <!-- Recommendations Section -->
            <aside class="recommendations">
                <h2>Recommended for you</h2>
                <div class="hotel-list">
                    @if(isset($recommendedHotels))
                        @foreach($recommendedHotels as $hotel)
                            <div class="hotel-card">
                                <img src="{{ $hotel->image_url }}" alt="{{ $hotel->name }}">
                                <h3>{{ $hotel->name }}</h3>
                                <p>{{ $hotel->location }}</p>
                                <p>{{ $hotel->price_per_night }} per night</p>
                                <button class="book-now-btn" data-hotel-id="{{ $hotel->id }}">Book Now</button>
                            </div>
                        @endforeach
                    @else
                        <p>No recommended hotels available.</p>
                    @endif
                </div>
            </aside>
        </div>
    </div>

<!-- Login Modal -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Login</h2>
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Log in</button>
        </form>
        <p class="register-text">Aren't a user yet? <a href="/register">Register here</a></p>
    </div>
</div>
>>>>>>> ce343f9 (Temp changes)
    
    <script>
        function bookHotel(hotelId) {
            alert('Booking hotel with ID: ' + hotelId);
            // Add your booking logic here
        }
<<<<<<< HEAD
    </script>
</body>
=======
        
        document.querySelectorAll('.book-now-btn').forEach(button => {
            button.addEventListener('click', function() {
                const hotelId = this.getAttribute('data-hotel-id');
                bookHotel(hotelId);
            });
        });

        // Get the modal
        var modal = document.getElementById("loginModal");

        // Get the button that opens the modal
        var btn = document.getElementById("login-btn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>


>>>>>>> ce343f9 (Temp changes)
</html>
