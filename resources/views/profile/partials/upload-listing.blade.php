<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Upload Listing') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Provide details about your listing to attract potential guests.') }}
        </p>
    </header>

    <form method="post" action="{{ route('listing.upload') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="listing_title" :value="__('Title')" />
            <x-text-input id="listing_title" name="title" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error :messages="$errors->uploadListing->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="listing_description" :value="__('Description')" />
            <textarea id="listing_description" name="description" class="mt-1 block w-full" rows="4" required></textarea>
            <x-input-error :messages="$errors->uploadListing->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="listing_price" :value="__('Price per Night')" />
            <x-text-input id="listing_price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->uploadListing->get('price')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="listing_image" :value="__('Upload Image')" />
            <input id="listing_image" name="image" type="file" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->uploadListing->get('image')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Upload') }}</x-primary-button>

            @if (session('status') === 'listing-uploaded')
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
