<div class="w-full p-4 mx-0 mb-3 bg-white shadow-sm sm:rounded-lg text-decoration-none">
    <h2 class="mb-4 text-lg font-semibold">Menu</h2>
    <ul>
        @if (@Auth::user()->role->name == 'Organisator')
            <li class="mb-2">
                <x-button-link href="{{ route('user.festivals') }}" :active="request()->routeIs('user.festivals*')">Mijn festivals</x-button-link>
            </li>
        @endif
        @if (@Auth::user()->role->name == 'Artiest')
            <li class="mb-2">
                <x-button-link href="{{ route('user.bookings') }}" :active="request()->routeIs('user.bookings*')">Mijn boekingen</x-button-link>
            </li>
        @endif
        <li class="mb-2">
            <x-button-link href="{{ route('user.tickets') }}" :active="request()->routeIs('user.tickets*')">Mijn tickets</x-button-link>
        </li>
    </ul>
</div>
