<x-dashboard-layout>
    <x-slot name="titleSlot">Gebruiker Bewerken</x-slot>
    <x-user-form :roles="$roles" :action="route('dashboard.users.update', compact('user'))" :user="$user"></x-user-form>
</x-dashboard-layout>
