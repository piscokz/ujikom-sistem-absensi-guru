@props(['width' => 'w-64'])

<div
    class="{{ $width }} bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 flex flex-col">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
            <x-application-logo class="h-8 w-auto" />
            <span class="ml-2 text-lg font-semibold text-slate-900 dark:text-slate-100">Absensi Guru</span>
        </div>

        <nav class="mt-8 flex-1 px-2 space-y-1">
            {{ $slot }}
        </nav>
    </div>

    <div class="flex-shrink-0 flex border-t border-slate-200 dark:border-slate-700 p-4">
        <div class="flex items-center w-full">
            <x-avatar :initials="strtoupper(substr(Auth::user()->name, 0, 2))" size="w-8 h-8" />
            <div class="ml-3 flex-1 min-w-0">
                <p class="text-sm font-medium text-slate-900 dark:text-slate-100 truncate">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                    {{ Auth::user()->email }}
                </p>
            </div>
        </div>
    </div>
</div>
