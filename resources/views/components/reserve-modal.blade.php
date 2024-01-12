<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak x-show="openEditRoleModal">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div>
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                            {{ $title ?? 'Rol' }}</h3>
                        <div class="mt-2">
                            <form method="post" action="{{ $action }}">
                                @csrf

                                <div class="mb-4">
                                    <x-input-label for="email">Naam</x-input-label>
                                    <input type="text" id="name" name="name"
                                        value="{{ $task->name ?? old('name') }}"
                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                    @error('name')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <x-input-label for="email">E-mail</x-input-label>
                                    <input type="text" id="email" name="email"
                                        value="{{ $task->email ?? old('email') }}"
                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                    @error('email')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-right">
                                    <a class="text-red-500 hover:underline mr-4"
                                        @click="openEditRoleModal = !openEditRoleModal" href="#">Annuleren</a>
                                    <x-primary-button type="submit">Opslaan</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
