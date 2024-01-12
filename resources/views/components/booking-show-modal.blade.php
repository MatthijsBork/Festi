<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak x-show="openEditRoleModal">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div>
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                            Festival uitnodiging</h3>
                        <div class="mt-2">
                            @csrf

                            <div class="mb-4">
                                <p>Festival: {{ $booking->festival->name }}</p>
                                <p>Locatie: {{ $booking->festival->location }}</p>
                                <p>Datum: {{ $booking->festival->date }}</p>
                                <a class="text-blue-500 hover:underline"
                                    href="{{ route('festivals.show', [$booking->festival]) }}">Bekijk festivalpagina</a>
                            </div>
                            <div class="mb-4">

                            </div>
                            <div class="text-right">
                                <a class="text-red-500 hover:underline mr-4"
                                    @click="openEditRoleModal = !openEditRoleModal" href="#">Annuleren</a>
                                @if ($booking->status != 1)
                                    <x-primary-link href="{{ route('user.bookings.accept', compact('booking')) }}"
                                        class="border-green-600 bg-green-400 hover:bg-green-500 text-white">Accepteren</x-primary-link>
                                @endif
                                @if ($booking->status != 2)
                                    <x-primary-link href="{{ route('user.bookings.reject', compact('booking')) }}"
                                        class="border-red-600 bg-red-400 hover:bg-red-500 text-white">Afwijzen</x-primary-link>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
