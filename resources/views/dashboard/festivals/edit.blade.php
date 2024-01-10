<x-dashboard-layout>
    <x-slot name="titleSlot">Woning Bewerken</x-slot>

    <x-festival-form :festival="$festival" :action="route('dashboard.festivals.update', compact('festival'))"></x-festival-form>
</x-dashboard-layout>
