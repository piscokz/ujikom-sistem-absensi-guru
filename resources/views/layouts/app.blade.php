<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistem Absensi Guru</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('images/lb.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div>
            @include('layouts.navigation')

            <div class="min-h-screen transition-all duration-300 ease-in-out sm:ml-64 pt-16 sm:pt-0 flex flex-col">

                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow z-10 relative">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-800 dark:text-gray-200">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main class="flex-1">
                    {{ $slot }}
                </main>
                
            </div>
        </div>
        @stack('scripts')
    </body>
</html>