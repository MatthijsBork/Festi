<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf

    <div class="tab-content">
        <div class="mb-4">
            <x-input-label for="name">Naam</x-input-label>
            <input type="text" id="name" name="name" value="{{ $user->name ?? old('name') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="email">E-mail</x-input-label>
            <input type="text" id="email" name="email" value="{{ $user->email ?? old('email') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="role">Rol</x-input-label>
            <select id="role" name="role"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <option selected disabled>Kies een rol</option>
                <option>Gebruiker</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('location')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="telephone">Telefoonnummer</x-input-label>
            <input type="text" id="telephone" name="telephone" value="{{ $user->telephone ?? old('telephone') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('telephone')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="address">Adres</x-input-label>
            <input type="text" id="address" name="address" value="{{ $user->address ?? old('address') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('address')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="postal">Postcode</x-input-label>
            <input type="text" id="postal" name="postal" value="{{ $user->postal_code ?? old('postal') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('postal')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="city">Stad</x-input-label>
            <input type="text" id="city" name="city" value="{{ $user->city ?? old('city') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('city')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="admin">Admin</x-input-label>
            <input type="checkbox" id="admin" name="admin" value="1"
                class="rounded-lg"{{ $user->is_admin ?? (null == 1 ?? old('admin')) ? 'checked' : '' }}>
            @error('admin')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="password">Wachtwoord</x-input-label>
            <input type="password" id="password" name="password"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('password')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <x-input-label for="title">Wachtwoord bevestigen</x-input-label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('password_confirmation')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="text-right">
        <a class="text-red-500 hover:underline mr-4" href="{{ route('dashboard.users') }}">Annuleren</a>
        <x-primary-button type="submit">Opslaan</x-primary-button>
    </div>
</form>
