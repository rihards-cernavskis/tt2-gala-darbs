<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a id="login-btn" href="/login" class="login-button">Log in</a>
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
                <button type="submit">Search</button>
            </form>
        </div>
        
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
                            <img src="{{ asset('storage/'.$hotel->image) }}" alt="{{ $hotel->name }}">
                            <h3>{{ $hotel->name }}</h3>
                            <p>{{ $hotel->address }}</p>
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
                                <img src="{{ asset('storage/'.$hotel->image) }}" alt="{{ $hotel->name }}">
                                <h3>{{ $hotel->name }}</h3>
                                <p>{{ $hotel->address }}</p>
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
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookButtons = document.querySelectorAll('.book-now-btn');
            bookButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const hotelId = this.getAttribute('data-hotel-id');
                    alert('Booking hotel with ID: ' + hotelId);
                    // Add your booking logic here
                });
            });
        });
    </script>
</body>
</html>
