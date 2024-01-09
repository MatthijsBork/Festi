<x-dashboard-layout>

    <x-slot name="titleSlot">Festival toevoegen</x-slot>

    <x-festival-form :action="route('dashboard.festivals.store')">
        <div class="mb-4">
            <x-input-label for="organizer">Organisator</x-input-label>
            <select id="organizer" name="organizer"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <option selected disabled>Kies een organisator</option>
                @foreach ($organizers as $organizer)
                    <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                @endforeach
            </select>
            @error('location')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </x-festival-form>

</x-dashboard-layout>
