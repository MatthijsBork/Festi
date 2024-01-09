<div class="w-full p-4 mx-0 mb-3 bg-white shadow-sm sm:rounded-lg text-decoration-none">
    <h2 class="mb-4 text-lg font-semibold">Menu</h2>
    <ul>
        <li class="mb-2">
            <x-button-link href="{{ route('index') }}" :active="request()->routeIs('*')">Auto's</x-button-link>
        </li>
    </ul>
</div>
