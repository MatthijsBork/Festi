<x-dashboard-layout>
    @csrf

    <x-slot name="titleSlot">
        <p>{{ $festival->name }}</p>
    </x-slot>

    <x-slot name="buttonSlot">
        <x-primary-link href="{{ route('dashboard.festivals.edit', compact('festival')) }}">Informatie
            bewerken</x-primary-link>
    </x-slot>

    <x-festival-tab-menu :festival="$festival"></x-festival-tab-menu>
    <div class="p-6 text-gray-900">
        <div class="flex md:flex-row w-full flex-col-reverse justify-between">
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <p>
                        <x-input-label>Naam</x-input-label>
                        {{ $festival->name }}
                    </p>
                    <p>
                        <x-input-label>E-mail</x-input-label>
                        {{ $festival->email }}
                    </p>
                    <p>
                        <x-input-label>Locatie</x-input-label>
                        {{ $festival->location }}
                    </p>
                    <p>
                        <x-input-label>Datum</x-input-label>
                        {{ $festival->date }}
                    </p>
                </div>
                <hr class="my-3">
                <div class="flex flex-row gap-5">
                    <div class="flex flex-col">
                        <b>Beschrijving:</b>
                        <p>{{ $festival->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
