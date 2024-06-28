<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleHome.css') }}">
    <title>{{ $translations['hotel_booking_website'] }}</title>
</head>
<body>
    <div class="header-container-wrapper">
        <header>
            <div class="header-container">
                <div class="header-left">
                    <h1>{{ $translations['hotel_booking_website'] }}</h1>
                </div>
                <div class="header-right">
                    <a id="login-btn" href="/login" class="login-button">{{ $translations['login'] }}</a>
                    <select id="language-select" onchange="location = this.value;">
                        <option value="{{ route('home', ['lang' => 'en']) }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        <option value="{{ route('home', ['lang' => 'lv']) }}" {{ app()->getLocale() == 'lv' ? 'selected' : '' }}>Latviešu</option>
                    </select>
                </div>
            </div>
        </header>
    </div>
    
    <div class="container">
        <!-- Search Section -->
        <div class="search-section">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="keywords" placeholder="{{ $translations['search_hotels'] }}">
                <button type="submit">{{ $translations['search_hotels'] }}</button>
            </form>
        </div>
        
        <!-- Main Content: Filters and Listings -->
        <div class="main-content">
            <!-- Filters Section -->
            <aside class="filters">
                <h2>{{ $translations['filters'] }}</h2>
                <div class="filter-card">
                    <h3>{{ $translations['breakfast'] }}</h3>
                    <label><input type="checkbox" name="breakfast" value="included"> {{ $translations['included'] }}</label>
                    <label><input type="checkbox" name="breakfast" value="not_included"> {{ $translations['not_included'] }}</label>
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
                            <img src="{{ asset('images/' . $hotel->image) }}" alt="{{ $hotel->name }}">
                            <h3>{{ $hotel->name }}</h3>
                            <p>{{ $hotel->address }}</p>
                            <button class="book-now-btn" data-hotel-id="{{ $hotel->id }}">{{ $translations['book_now'] }}</button>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>{{ $translations['login'] }}</h2>
            <form>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">{{ $translations['login'] }}</button>
            </form>
            <p class="register-text">{{ __('messages.not_a_user') }} <a href="/register">{{ $translations['register'] }}</a></p>
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
