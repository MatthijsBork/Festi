@if (request()->routeIs('dashboard.festivals*'))
    <div class="mb-4">
        <x-nav-link class="pb-3" :href="route('dashboard.festivals.info', compact('festival'))" :active="request()->routeIs('dashboard.festivals.info*')">
            Informatie
        </x-nav-link>
        <x-nav-link class="pb-3" :href="route('dashboard.festivals.images', compact('festival'))" :active="request()->routeIs('dashboard.festivals.images*')">
            Foto's
        </x-nav-link>
        <hr>
    </div>
@else
    <div class="mb-4">
        <x-nav-link class="pb-3" :href="route('user.festivals.info', compact('festival'))" :active="request()->routeIs('user.festivals.info*')">
            Informatie
        </x-nav-link>
        <x-nav-link class="pb-3" :href="route('user.festivals.images', compact('festival'))" :active="request()->routeIs('user.festivals.images*')">
            Foto's
        </x-nav-link>
        <x-nav-link class="pb-3" :href="route('user.festivals.bookings', compact('festival'))" :active="request()->routeIs('user.festivals.bookings*')">
            Boekingen
        </x-nav-link>
        <hr>
    </div>
@endif
