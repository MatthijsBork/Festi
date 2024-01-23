<x-layout>
    @csrf

    <x-slot name="titleSlot">
        <p>{{ $festival->name }}</p>
    </x-slot>

    <x-slot name="buttonSlot">
        <div class="flex justify-end" x-cloak x-data="{ openEditRoleModal: {{ $errors->any() ? 'true' : 'false' }} }">
            <x-primary-link @click="openEditRoleModal = ! openEditRoleModal" type="button" href="#">Artiesten
                boeken</x-primary-link>
            <x-booking-modal :artists="$artists" :action="route('user.festivals.bookings.store', compact('festival'))"></x-booking-modal>
        </div>
    </x-slot>

    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-festival-tab-menu :festival="$festival"></x-festival-tab-menu>

    @if (!isset($bookings[0]))
        <div class="w-full p-10 text-center bg-white rounded-lg">
            <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
            <p class="mb-4">Er zijn nog geen artiesten uitgenodigd</p>
        </div>
    @else
        <table class="w-full text-left bg-white table-auto sm:rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Artiest</th>
                    <th class="px-4 py-3">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            <p>{{ $booking->user->name }}</p>
                        </td>
                        <td class="px-4 py-3">
                            @if ($booking->status == 2)
                                <p class="text-red-500">Geweigerd</p>
                            @elseif($booking->status == 1)
                                <p class="text-green-500">Geaccepteerd</p>
                            @else
                                <p>Open</p>
                            @endif
                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <div class="flex justify-end" x-cloak x-data="{ openEditRoleModal: false }">
                                <a title="Bewerken" @click="openEditRoleModal = ! openEditRoleModal" type="button"
                                    href="{{ route('user.festivals.bookings', compact('festival')) }}"
                                    class="text-blue-700 hover:underline">
                                    <x-edit-icon></x-edit-icon>
                                </a>
                                <x-booking-edit-modal :booking="$booking" :action="route('user.festivals.bookings.update', compact('festival', 'booking'))"
                                    title="Boeking bewerken"></x-booking-edit-modal>
                            </div>
                            <a title="Verwijderen"
                                href="{{ route('user.festivals.bookings.delete', compact('festival', 'booking')) }}"
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
            {{ $bookings->links() }}
        </div>
    @endif
</x-layout>
