@props(['title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} - {{ config('app.name', 'Absensi Guru') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full bg-slate-50 dark:bg-slate-900">
    <div class="min-h-full">
        <!-- Mobile sidebar overlay -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 flex md:hidden" role="dialog"
            aria-modal="true">
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-600 bg-opacity-75" aria-hidden="true">
            </div>

            <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                class="relative flex w-full max-w-xs flex-1 flex-col bg-white dark:bg-slate-800 pt-5 pb-4 shadow-xl">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" x-on:click="sidebarOpen = false"
                        class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <x-lucide-x class="h-6 w-6 text-white" />
                    </button>
                </div>

                <x-sidebar width="w-full">
                    {{ $sidebar ?? '' }}
                </x-sidebar>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <x-sidebar>
                {{ $sidebar ?? '' }}
            </x-sidebar>
        </div>

        <div class="md:pl-64 flex flex-col flex-1">
            <div
                class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white dark:bg-slate-800 shadow border-b border-slate-200 dark:border-slate-700">
                <button type="button" x-on:click="sidebarOpen = true"
                    class="border-r border-slate-200 dark:border-slate-700 px-4 text-slate-500 dark:text-slate-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-slate-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <x-lucide-menu class="h-6 w-6" />
                    <div class="flex flex-1">
                        <div class="flex w-full md:ml-0">
                            <label for="search-field" class="sr-only">Search</label>
                            <div
                                class="relative w-full text-slate-400 focus-within:text-slate-600 dark:focus-within:text-slate-300">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                                    <x-lucide-search class="h-5 w-5" />
                                </div>
                                <input id="search-field"
                                    class="block h-full w-full border-0 bg-transparent py-2 pl-8 pr-3 text-slate-900 dark:text-slate-100 placeholder-slate-500 dark:placeholder-slate-400 focus:ring-0 focus:placeholder-slate-400 sm:text-sm"
                                    placeholder="Search..." type="search" name="search">
                            </div>
                        </div>
                    </div>

                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button type="button" x-on:click="open = !open"
                                    class="flex max-w-xs items-center rounded-full bg-white dark:bg-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <x-avatar :initials="strtoupper(substr(Auth::user()->name, 0, 2))" size="w-8 h-8" />
                                </button>
                            </div>

                            <div x-show="open" x-on:click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-slate-800 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <main class="flex-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('app', () => ({
                sidebarOpen: false,
            }))
        })
    </script>
</body>

</html>
