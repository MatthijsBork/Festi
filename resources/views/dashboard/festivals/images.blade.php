<x-dashboard-layout>
    @csrf

    <x-slot name="titleSlot">
        <p>{{ $festival->name }}</p>
    </x-slot>

    <x-slot name="buttonSlot">
        <x-primary-link href="{{ route('dashboard.festivals.images.edit', compact('festival')) }}">Foto's
            bewerken</x-primary-link>
    </x-slot>

    <x-festival-tab-menu :festival="$festival"></x-festival-tab-menu>

    <div class="p-6 text-gray-900">
        <div class="flex md:flex-row w-full flex-col-reverse justify-between">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($festival_images as $index => $image)
                    <div class="relative group cursor-pointer">
                        <img src="{{ asset('images/festivals/' . $festival->id . '/' . $image->img) }}"
                            alt="Image {{ $index }}"
                            class="w-full h-40 object-cover rounded-md transition duration-300 transform hover:scale-105">
                        <div class="hidden group-hover:flex fixed">
                            <img src="{{ asset('images/festivals/' . $festival->id . '/' . $image->img) }}"
                                alt="Image {{ $index }}" class="rounded-xl shadow max-w-full max-h-full">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-dashboard-layout>
