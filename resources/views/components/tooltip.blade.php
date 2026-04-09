@props(['text', 'position' => 'top'])

<span x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false" class="relative">
    {{ $slot }}

    <div x-show="show" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="absolute z-50 px-2 py-1 text-xs text-white bg-slate-900 dark:bg-slate-700 rounded shadow-lg pointer-events-none whitespace-nowrap
        {{ $position === 'top' ? 'bottom-full left-1/2 transform -translate-x-1/2 mb-1' : '' }}
        {{ $position === 'bottom' ? 'top-full left-1/2 transform -translate-x-1/2 mt-1' : '' }}
        {{ $position === 'left' ? 'right-full top-1/2 transform -translate-y-1/2 mr-1' : '' }}
        {{ $position === 'right' ? 'left-full top-1/2 transform -translate-y-1/2 ml-1' : '' }}"
        style="display: none;">
        {{ $text }}

        <!-- Arrow -->
        @if ($position === 'top')
            <div
                class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-slate-900 dark:border-t-slate-700">
            </div>
        @elseif($position === 'bottom')
            <div
                class="absolute bottom-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-b-slate-900 dark:border-b-slate-700">
            </div>
        @elseif($position === 'left')
            <div
                class="absolute left-full top-1/2 transform -translate-y-1/2 border-4 border-transparent border-l-slate-900 dark:border-l-slate-700">
            </div>
        @elseif($position === 'right')
            <div
                class="absolute right-full top-1/2 transform -translate-y-1/2 border-4 border-transparent border-r-slate-900 dark:border-r-slate-700">
            </div>
        @endif
    </div>
</span>
