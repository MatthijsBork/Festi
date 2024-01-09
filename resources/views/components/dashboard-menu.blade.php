<div class="w-full p-4 mx-0 mb-3 bg-white shadow-sm sm:rounded-lg text-decoration-none">
    <h2 class="mb-4 text-lg font-semibold">Dashboard menu</h2>
    <ul>
        <li class="mb-2">
            <x-button-link href="{{ route('dashboard.festivals') }}" :active="request()->routeIs('dashboard.festivals*')">Festivals</x-button-link>
        </li>
        <li class="mb-2">
            <x-button-link href="{{ route('dashboard.roles') }}" :active="request()->routeIs('dashboard.roles*')">Rollen</x-button-link>
        </li>
        <li class="mb-2">
            <x-button-link href="{{ route('dashboard.users') }}" :active="request()->routeIs('dashboard.users*')">Gebruikers</x-button-link>
        </li>
    </ul>
</div>
