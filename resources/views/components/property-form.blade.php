<form action="{{ $action }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-semibold text-gray-600">Naam</label>
        <input type="text" name="name" value="{{ $property->name ?? old('name') }}"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
    </div>
    @error('name')
        <div class="text-red-500">{{ $message }}</div>
    @enderror
    <div class="text-right">
        <a class="mr-2 text-red-500 hover:underline" href="{{ route('dashboard.properties') }}">Annuleren</a>
        <x-primary-button type="submit">Opslaan</x-primary-button>
    </div>
</form>
