<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Conducto.</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            <div class="container py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="relative px-4 py-3 my-3 text-green-700 bg-green-100 border border-green-400 rounded"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="relative px-4 py-3 my-3 text-red-700 bg-red-100 border border-red-400 rounded"
                        role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="justify-between md:flex">
                    <div class="w-full">
                        <div class="w-full">
                            <div class="mb-2 flex items-center justify-between">
                                <div class="flex-shrink-0">
                                    @if (isset($titleSlot))
                                        {{ $titleSlot }}
                                    @else
                                        <a class="text-blue-500 hover:underline" href="{{ url()->previous() }}">
                                            < Terug</a>
                                    @endif
                                </div>
                            </div>
                            <div class="p-6 overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
