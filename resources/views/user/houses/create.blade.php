<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="titleSlot">Woning toevoegen</x-slot>

    <x-house-form :action="route('user.houses.store')"></x-house-form>
</x-layout>
