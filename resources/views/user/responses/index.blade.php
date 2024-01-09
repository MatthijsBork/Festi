<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    <x-slot name="titleSlot">Mijn reacties</x-slot>

    @if (!isset($responses[0]))
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
                    <th class="px-4 py-3">Naam</th>
                    <th class="px-4 py-3">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $house_response)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            <a class="hover:underline"
                                href="{{ route('user.responses.show', compact('house_response')) }}">{{ $house_response->house->address }}
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $house_response->house->city }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $house_response->name }}</p>
                        </td>
                        <td class="px-4 py-3">
                            @if ($house_response->status == 1)
                                <p class="text-green-600">Geaccepteerd</p>
                            @else
                                <p>Open</p>
                            @endif
                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <a title="Bekijken" href="{{ route('user.responses.show', compact('house_response')) }}"
                                class="text-blue-700 hover:underline">
                                <x-eye-icon></x-eye-icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-4">
            {{ $responses->links() }}
        </div>
    @endif
</x-layout>
