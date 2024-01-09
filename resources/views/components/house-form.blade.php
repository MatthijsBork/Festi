<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf

    <div class="tab-content">
        {{ $slot ?? null }}
        <div class="mb-4">
            <x-input-label for="address">Adres</x-input-label>
            <input type="text" id="address" name="address" value="{{ $house->address ?? old('address') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('address')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="postal_code">Postcode</x-input-label>
            <input type="text" id="postal_code" name="postal_code"
                value="{{ $house->postal_code ?? old('postal_code') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('postal_code')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="city">Stad</x-input-label>
            <input type="text" id="city" name="city" value="{{ $house->city ?? old('city') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('city')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="rooms">Aantal kamers</x-input-label>
            <input type="text" id="city" name="rooms" value="{{ $house->rooms ?? old('rooms') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('rooms')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="rent">Huurprijs</x-input-label>
            <input type="text" id="rent" name="rent" value="{{ $house->rent ?? old('rent') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('rent')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="description">Beschrijving</x-input-label>
            <textarea id="description" name="description" style="height: 250px;"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ $house->description ?? old('description') }}</textarea>
            @error('description')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-right">
            <a class="text-red-500 hover:underline mr-4" <a class="text-red-500 hover:underline mr-4"
                href="javascript:history.back()">Annuleren</a>
            <x-primary-button type="submit">Opslaan</x-primary-button>
        </div>
</form>
