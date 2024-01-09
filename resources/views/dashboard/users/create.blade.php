<x-dashboard-layout>
    <x-slot name="titleSlot">Gebruiker toevoegen</x-slot>
    <x-user-form :action="route('dashboard.users.store')" :roles="$roles"></x-user-form>
</x-dashboard-layout>
