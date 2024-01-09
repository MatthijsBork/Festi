<x-layout>
    <x-slot name="menuSlot">
        <x-user-menu></x-user-menu>
    </x-slot>

    <x-slot name="titleSlot">Woning Bewerken</x-slot>

    <x-house-form :house="$house" :action="route('user.houses.update', compact('house'))"></x-house-form>
</x-layout>
