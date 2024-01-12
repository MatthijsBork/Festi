<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="titleSlot">Festival Bewerken</x-slot>

    <x-festival-form :house="$house" :action="route('user.festivals.update', compact('festival'))"></x-festival-form>
</x-layout>
