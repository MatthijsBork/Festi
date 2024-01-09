<x-layout>

    <x-slot name="titleSlot">Aanbod</x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    <x-slot name="noBackgroundSlot">
        @if (!isset($houses[0]))
            <div class="w-full p-10 text-center bg-white rounded-lg">
                <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
                <p class="mb-4">Er zijn geen woningen gevonden</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($houses as $house)
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="{{ route('houses.show', compact('house')) }}">
                            <img src="{{ $house->images->first() != null ? asset('images/houses/' . $house->id . '/' . $house->images->first()->img) : asset('images/houses/house-placeholder.png') }}"
                                class="w-full h-48 object-cover rounded-t-lg">
                        </a>
                        <div class="p-4">
                            <h2 class="text-lg font-bold"><a
                                    href="{{ route('houses.show', compact('house')) }}">{{ $house->address . ', ' . $house->city }}</a>
                            </h2>
                            <h2 class="text-md font-bold">{{ $house->postal_code }}</h2>
                            <p class="text-gray-500">€{{ $house->rent . '/maand' }}</p>
                            <p class="text-gray-500">{{ $house->rooms . ' kamers' }}</p>
                            <x-primary-link
                                href="{{ route('houses.show', compact('house')) }}">Bekijken</x-primary-link>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="my-4">
            {{ $houses->links() }}
        </div>
    </x-slot>
</x-layout>
