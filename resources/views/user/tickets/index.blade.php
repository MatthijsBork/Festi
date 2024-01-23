<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    <x-slot name="titleSlot">Mijn tickets</x-slot>

    @if (!isset($tickets[0]))
        <div class="w-full p-10 text-center bg-white rounded-lg">
            <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
            <p class="mb-4">Er zijn geen tickets gevonden</p>
            <x-primary-link href="{{ route('festivals.index') }}">Festivals bekijken</x-primary-link>
        </div>
    @else
        <table class="w-full text-left bg-white table-auto sm:rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Festival</th>
                    <th class="px-4 py-3">Locatie</th>
                    <th class="px-4 py-3">Datum</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            {{ $ticket->festival->name }}
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $ticket->festival->location }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $ticket->festival->date }}</p>

                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <a title="Verwijderen" href="{{ route('user.tickets.delete', compact('ticket')) }}"
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
            {{ $tickets->links() }}
        </div>
    @endif
</x-layout>
