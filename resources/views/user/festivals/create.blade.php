<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="titleSlot">Festival toevoegen</x-slot>

    <x-festival-form :action="route('user.festivals.store')"></x-festival-form>
</x-layout>
