<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf

    <div class="tab-content">
        {{ $slot ?? null }}
        <div class="mb-4">
            <x-input-label for="name">Festivalnaam</x-input-label>
            <input type="text" id="name" name="name" value="{{ $festival->name ?? old('name') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="email">Klanten E-mail</x-input-label>
            <input type="text" id="email" name="email" value="{{ $festival->email ?? old('email') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="location">Locatie</x-input-label>
            <input type="text" id="location" name="location" value="{{ $festival->location ?? old('location') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('location')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="date">Datum</x-input-label>
            <input type="date" id="date" name="date" value="{{ $festival->city ?? old('city') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('date')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="description">Beschrijving</x-input-label>
            <textarea id="description" name="description" style="height: 250px;"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ $festival->description ?? old('description') }}</textarea>
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
