<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="titleSlot">{{ $festival->address . ', ' . $festival->city }}</x-slot>

    <x-festival-tab-menu :festival="$festival"></x-festival-tab-menu>
    @if (!isset($responses[0]))
        <div class="w-full p-10 text-center bg-white rounded-lg">
            <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
            <p class="mb-4">Er zijn geen reacties gevonden</p>
        </div>
    @else
        <table class="w-full text-left bg-white table-auto sm:rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Naam</th>
                    <th class="px-4 py-3">E-mail</th>
                    <th class="px-4 py-3">Telefoonnummer</th>
                    <th class="px-4 py-3">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($festival->responses as $festival_response)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            <a class="hover:underline"
                                href="{{ route('user.festivals.responses.show', compact('festival', 'festival_response')) }}">{{ $festival_response->name }}</a>
                        </td>
                        <td class="px-4 py-3">
                            <a>{{ $festival_response->email }}</a>
                        </td>
                        <td class="px-4 py-3">
                            <a>{{ $festival_response->telephone }}</a>
                        </td>
                        <td class="px-4 py-3">
                            <a>{{ $festival_response->status == 1 ? 'Geaccepteerd' : 'Open' }}</a>
                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <a title="Informatie"
                                href="{{ route('user.festivals.responses.show', compact('festival', 'festival_response')) }}"
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
