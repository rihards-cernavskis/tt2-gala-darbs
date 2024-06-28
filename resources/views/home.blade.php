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

    <!-- Booking Form Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Book Hotel</h2>
            <form id="bookingForm">
                @csrf
                <input type="hidden" name="hotel_id" id="hotel_id">
                <div>
                    <label for="check_in">Check-In Date:</label>
                    <input type="date" id="check_in" name="check_in" required>
                </div>
                <div>
                    <label for="check_out">Check-Out Date:</label>
                    <input type="date" id="check_out" name="check_out" required>
                </div>
                <button type="submit">Book Now</button>
            </form>
        </div>
    </div>

    <script>
        const bookRoute = "{{ route('book') }}"; // Pass the route from Blade to JavaScript

        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOM fully loaded and parsed");
            const bookButtons = document.querySelectorAll('.book-now-btn');
            const bookingModal = document.getElementById('bookingModal');
            const bookingForm = document.getElementById('bookingForm');
            const closeModal = document.querySelector('.modal-content .close');
            
            bookButtons.forEach(button => {
                button.addEventListener('click', function() {
                    console.log("Book button clicked");
                    const hotelId = this.getAttribute('data-hotel-id');
                    document.getElementById('hotel_id').value = hotelId;
                    bookingModal.style.display = 'block';
                });
            });

            closeModal.addEventListener('click', function() {
                bookingModal.style.display = 'none';
            });

            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log("Form submitted");
                
                const formData = new FormData(bookingForm);
                console.log("Form Data: ", Array.from(formData.entries()));

                fetch(bookRoute, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Response Data: ", data);
                    alert(data.message);
                    bookingModal.style.display = 'none';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });

            window.onclick = function(event) {
                if (event.target == bookingModal) {
                    bookingModal.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
