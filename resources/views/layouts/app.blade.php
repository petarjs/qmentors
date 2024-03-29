<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

@stack('head')

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100">
    @role('operator')
    @include('navigation.navigation-operator')
    @endrole

    @role('mentor')
    @include('navigation.navigation-mentor')
    @endrole

    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
@endif

<!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
<x-jet-banner/>

@stack('modals')

@livewireScripts
</body>
</html>
