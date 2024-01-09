<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    <x-slot name="titleSlot">Mijn woningen</x-slot>

    <x-slot name="buttonSlot">
        <x-primary-link href="{{ route('user.houses.create') }}">Woning toevoegen</x-primary-link>
    </x-slot>

    @if (!isset($houses[0]))
        <div class="w-full p-10 text-center bg-white rounded-lg">
            <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
            <p class="mb-4">Er zijn geen woningen gevonden</p>
        </div>
    @else
        <table class="w-full text-left bg-white table-auto sm:rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Adres</th>
                    <th class="px-4 py-3">Stad</th>
                    <th class="px-4 py-3">Huurprijs</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($houses as $house)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            <a class="hover:underline"
                                href="{{ route('user.houses.info', compact('house')) }}">{{ $house->address }}</a>
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $house->city }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p>€{{ $house->rent }}</p>
                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <a title="Bewerken" href="{{ route('user.houses.info', compact('house')) }}"
                                class="text-blue-700 hover:underline">
                                <x-edit-icon></x-edit-icon>
                            </a>
                            <a title="Verwijderen" href="{{ route('user.houses.delete', compact('house')) }}"
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
            {{ $houses->links() }}
        </div>
    @endif
</x-layout>
