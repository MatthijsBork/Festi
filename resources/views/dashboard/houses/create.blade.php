<x-dashboard-layout>

    <x-slot name="titleSlot">Woning toevoegen</x-slot>

    <x-house-form :action="route('dashboard.houses.store')"></x-house-form>

</x-dashboard-layout>
