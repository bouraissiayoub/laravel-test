<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestion des réservations') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="border-b border-gray-200 bg-white/80 backdrop-blur">
                <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <footer class="border-t border-gray-200 bg-white/70">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-gray-500 flex items-center justify-between">
                <div>© {{ date('Y') }} {{ config('app.name', 'Gestion des réservations') }}</div>
                <div class="hidden sm:block">Projet Laravel • Breeze • Livewire • Filament</div>
            </div>
        </footer>
    </div>

    @livewireScripts
</body>
</html>