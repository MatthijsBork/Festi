<x-dashboard-layout>
    <x-slot name="titleSlot">Dashboard</x-slot>

    <h2 class="text-xl font-semibold">Welkom {{ Auth::user()->name }}</h2>
    <p>Je bent ingelogd als admin!</p>
    <p>Gebruik het menu links</p>
</x-dashboard-layout>
