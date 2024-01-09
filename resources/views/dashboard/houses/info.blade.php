<x-dashboard-layout>
    @csrf

    <x-slot name="titleSlot">
        <p>{{ $house->address . ', ' . $house->city }}</p>
    </x-slot>

    <x-slot name="buttonSlot">
        <x-primary-link href="{{ route('dashboard.houses.edit', compact('house')) }}">Informatie bewerken</x-primary-link>
    </x-slot>

    <x-house-tab-menu :house="$house"></x-house-tab-menu>
    <div class="p-6 text-gray-900">
        <div class="flex md:flex-row w-full flex-col-reverse justify-between">
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <p>
                        <x-input-label>Postcode</x-input-label>
                        {{ $house->postal_code }}
                    </p>
                    <p>
                        <x-input-label>Adres</x-input-label>
                        {{ $house->address . ', ' . $house->city }}
                    </p>
                    <p>
                        <x-input-label>Huur</x-input-label>
                        {{ $house->rent }}
                    </p>
                    <p>
                        <x-input-label>Kamers</x-input-label>
                        {{ $house->rooms }}
                    </p>
                </div>
                <hr class="my-3">
                <div class="flex flex-row gap-5">
                    <div class="flex flex-col">
                        <b>Beschrijving:</b>
                        <p>{{ $house->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
