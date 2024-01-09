<x-dashboard-layout>
    @csrf

    <x-slot name="titleSlot">
        <p>{{ $house->address . ', ' . $house->city }}</p>
    </x-slot>

    <x-slot name="buttonSlot">
        <x-primary-link href="{{ route('user.houses.images.edit', compact('house')) }}">Foto's bewerken</x-primary-link>
    </x-slot>

    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-house-tab-menu :house="$house"></x-house-tab-menu>

    <div class="p-6 text-gray-900">
        <div class="flex md:flex-row w-full flex-col-reverse justify-between">
            @if (!isset($house_images[0]))
                <div class="w-full p-10 text-center bg-white rounded-lg">
                    <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
                    <p class="mb-4">Er zijn geen foto's gevonden</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($house_images as $index => $image)
                        <div class="relative group cursor-pointer">
                            <img src="{{ asset('images/houses/' . $house->id . '/' . $image->img) }}"
                                alt="Image {{ $index }}"
                                class="w-full h-40 object-cover rounded-md transition duration-300 transform hover:scale-105">
                            <div class="hidden group-hover:flex fixed">
                                <img src="{{ asset('images/houses/' . $house->id . '/' . $image->img) }}"
                                    alt="Image {{ $index }}" class="rounded-xl shadow max-w-full max-h-full">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
