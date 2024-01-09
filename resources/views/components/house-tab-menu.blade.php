@if (request()->routeIs('dashboard.houses*'))
    <div class="mb-4">
        <x-nav-link class="pb-3" :href="route('dashboard.houses.info', compact('house'))" :active="request()->routeIs('dashboard.houses.info*')">
            Informatie
        </x-nav-link>
        <x-nav-link class="pb-3" :href="route('dashboard.houses.images', compact('house'))" :active="request()->routeIs('dashboard.houses.images*')">
            Foto's
        </x-nav-link>
        <hr>
    </div>
@else
    <div class="mb-4">
        <x-nav-link class="pb-3" :href="route('user.houses.info', compact('house'))" :active="request()->routeIs('user.houses.info*')">
            Informatie
        </x-nav-link>
        <x-nav-link class="pb-3" :href="route('user.houses.images', compact('house'))" :active="request()->routeIs('user.houses.images*')">
            Foto's
        </x-nav-link>
        <x-nav-link class="pb-3" :href="route('user.houses.responses', compact('house'))" :active="request()->routeIs('user.houses.responses*')">
            Reacties
        </x-nav-link>
        <hr>
    </div>
@endif
