<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    <x-slot name="titleSlot">Mijn uitnodigingen</x-slot>

    @if (!isset($bookings[0]))
        <div class="w-full p-10 text-center bg-white rounded-lg">
            <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
            <p class="mb-4">Er zijn geen boekingen gevonden</p>
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
                @foreach ($bookings as $booking)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            {{ $booking->festival->name }}
                        </td>
                        <td class="px-4 py-3">
                            <p>{{ $booking->festival->location }}</p>
                        </td>
                        <td class="px-4 py-3">
                            @if ($booking->status == 1)
                                <p class="text-green-700">Geaccepteerd</p>
                            @elseif ($booking->status == 2)
                                <p class="text-red-700">Geweigerd</p>
                            @else
                                <p>Open</p>
                            @endif

                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <div class="flex justify-end" x-cloak x-data="{ openEditRoleModal: false }">
                                <a title="Bekijken" @click="openEditRoleModal = ! openEditRoleModal" type="button"
                                    class="text-blue-700 hover:underline">
                                    <x-eye-icon></x-eye-icon>
                                </a>
                                <x-booking-show-modal :booking="$booking" title="Bekijk boeking"></x-booking-show-modal>
                            </div>
                            <a title="Verwijderen" href="{{ route('user.bookings.delete', compact('booking')) }}"
                                class="text-red-500"
                                onclick="return confirm('Weet u zeker dat u dit wilt verwijderen?');">
                                <x-trash-icon></x-trash-icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-4">
            {{ $bookings->links() }}
        </div>
    @endif
</x-layout>
