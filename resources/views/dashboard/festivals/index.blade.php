<x-dashboard-layout>
    <x-slot name="titleSlot">
        Festivals
    </x-slot>

    <x-slot name="buttonSlot">
        <x-primary-link href="{{ route('dashboard.festivals.create') }}">Festival toevoegen</x-primary-link>
    </x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    @if (!isset($festivals[0]))
        <div class="w-full p-10 text-center bg-white rounded-lg">
            <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
            <p class="mb-4">Er zijn geen festivals gevonden</p>
        </div>
    @else
        <table class="w-full text-left bg-white table-auto sm:rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Naam</th>
                    <th class="px-4 py-3">Locatie</th>
                    <th class="px-4 py-3">Datum</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($festivals as $festival)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            <a class="hover:underline"
                                href="{{ route('dashboard.festivals.info', compact('festival')) }}">{{ $festival->name }}</a>
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $festival->location }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $festival->date }}</p>
                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <a title="Bewerken" href="{{ route('dashboard.festivals.info', compact('festival')) }}"
                                class="text-blue-700 hover:underline">
                                <x-edit-icon></x-edit-icon>
                            </a>
                            <a title="Verwijderen" href="{{ route('dashboard.festivals.delete', compact('festival')) }}"
                                class="text-red-500 hover:underline"
                                onclick="return confirm('Weet u zeker dat u dit wilt verwijderen?');">
                                <x-trash-icon></x-trash-icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-4">
            {{ $festivals->links() }}
        </div>
    @endif
</x-dashboard-layout>
