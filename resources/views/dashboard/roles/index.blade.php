<x-dashboard-layout>
    <x-slot name="titleSlot">
        Rollen
    </x-slot>

    <x-slot name="buttonSlot">
        <div class="flex justify-end" x-cloak x-data="{ openEditRoleModal: {{ $errors->any() ? 'true' : 'false' }} }">
            <x-primary-link @click="openEditRoleModal = ! openEditRoleModal" type="button" href="#">Rol
                toevoegen</x-primary-link>
            <x-role-modal :action="route('dashboard.roles.store')" title="Rol toevoegen"></x-role-modal>
        </div>
    </x-slot>

    <x-slot name="searchSlot">
        <x-search :action="null"></x-search>
    </x-slot>

    @if (!isset($roles[0]))
        <div class="w-full p-10 text-center bg-white rounded-lg">
            <h1 class="text-xl font-bold text-blue-500">Veel leegte...</h1>
            <p class="mb-4">Er zijn geen rollen gevonden</p>
        </div>
    @else
        <table class="w-full text-left bg-white table-auto sm:rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Naam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="border-b even:bg-gray-50">
                        <td class="px-4 py-3">
                            <a class="hover:underline">{{ $role->name }}</a>
                        </td>
                        <td class="flex justify-end py-3 text-right">
                            <div class="flex justify-end" x-cloak x-data="{ openEditRoleModal: false }">
                                <a title="Bewerken" @click="openEditRoleModal = ! openEditRoleModal" type="button"
                                    href="#" class="text-blue-700 hover:underline">
                                    <x-edit-icon></x-edit-icon>
                                </a>
                                <x-role-modal :role="$role" :action="route('dashboard.roles.update', compact('role'))" title="Rol bewerken"></x-role-modal>
                            </div>
                            <a title="Verwijderen" href="{{ route('dashboard.roles.delete', compact('role')) }}"
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
            {{ $roles->links() }}
        </div>
    @endif
</x-dashboard-layout>
