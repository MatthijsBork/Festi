<x-layout>

    <x-slot name="titleSlot">Aanbod</x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    <x-slot name="noBackgroundSlot">
        @if (!isset($festivals[0]))
            <div class="w-full p-10 text-center bg-white rounded-lg">
                <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
                <p class="mb-4">Er zijn geen festivals gevonden</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($festivals as $festival)
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="{{ route('festivals.show', compact('festival')) }}">
                            <img src="{{ $festival->images->first() != null ? asset('images/festivals/' . $festival->id . '/' . $festival->images->first()->img) : asset('images/festivals/festival-placeholder.png') }}"
                                class="w-full h-48 object-cover rounded-t-lg">
                        </a>
                        <div class="p-4">
                            <h2 class="text-lg font-bold"><a
                                    href="{{ route('festivals.show', compact('festival')) }}">{{ $festival->name }}</a>
                            </h2>
                            <h2 class="text-md font-bold">{{ $festival->location }}</h2>
                            <p class="text-gray-500"></p>
                            <p class="text-gray-500">{{ $festival->rooms . ' kamers' }}</p>
                            <x-primary-link
                                href="{{ route('festivals.show', compact('festival')) }}">Bekijken</x-primary-link>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="my-4">
            {{ $festivals->links() }}
        </div>
    </x-slot>
</x-layout>
