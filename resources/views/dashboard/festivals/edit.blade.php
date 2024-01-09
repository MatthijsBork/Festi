<x-dashboard-layout>
    <x-slot name="titleSlot">Woning Bewerken</x-slot>

    <x-house-form :house="$house" :action="route('dashboard.houses.update', compact('house'))"></x-house-form>
</x-dashboard-layout>
