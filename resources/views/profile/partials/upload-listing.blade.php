<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Upload Hotel') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Provide details about your hotel to attract potential guests.') }}
        </p>
    </header>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('hotels.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="hotel_name" :value="__('Name')" />
            <x-text-input id="hotel_name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->uploadHotel->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hotel_address" :value="__('Address')" />
            <x-text-input id="hotel_address" name="address" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->uploadHotel->get('address')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hotel_city" :value="__('City')" />
            <x-text-input id="hotel_city" name="city" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->uploadHotel->get('city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hotel_country" :value="__('Country')" />
            <x-text-input id="hotel_country" name="country" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->uploadHotel->get('country')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hotel_image" :value="__('Upload Image')" />
            <input id="hotel_image" name="image" type="file" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->uploadHotel->get('image')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Upload') }}</x-primary-button>

            @if (session('status') === 'hotel-uploaded')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Uploaded.') }}</p>
            @endif
        </div>
    </form>
</section>
