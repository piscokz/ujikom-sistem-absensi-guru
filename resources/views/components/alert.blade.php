@props(['type' => 'info', 'dismissible' => true])

@php
    $typeClasses = match ($type) {
        'success'
            => 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-100 border-green-300 dark:border-green-700',
        'error' => 'bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-100 border-red-300 dark:border-red-700',
        'warning'
            => 'bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-100 border-yellow-300 dark:border-yellow-700',
        'info' => 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-100 border-blue-300 dark:border-blue-700',
        default
            => 'bg-slate-100 dark:bg-slate-900 text-slate-700 dark:text-slate-100 border-slate-300 dark:border-slate-700',
    };

    $closeColor = match ($type) {
        'success' => 'hover:text-green-900 dark:hover:text-green-200',
        'error' => 'hover:text-red-900 dark:hover:text-red-200',
        'warning' => 'hover:text-yellow-900 dark:hover:text-yellow-200',
        'info' => 'hover:text-blue-900 dark:hover:text-blue-200',
        default => 'hover:text-slate-900 dark:hover:text-slate-200',
    };
@endphp

@if ($dismissible)
    <div x-data="{ show: true }" x-show="show"
        class="flex items-center justify-between {{ $typeClasses }} border px-4 py-3 rounded-lg shadow-sm"
        role="alert">
        <span class="font-medium">{{ $slot }}</span>
        <button @click="show = false" class="text-lg font-bold {{ $closeColor }}">&times;</button>
    </div>
@else
    <div class="flex items-center {{ $typeClasses }} border px-4 py-3 rounded-lg shadow-sm" role="alert">
        <span class="font-medium">{{ $slot }}</span>
    </div>
@endif
