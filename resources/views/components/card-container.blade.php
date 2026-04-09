@props([
    'rounded' => 'rounded-2xl',
    'shadow' => 'shadow-sm',
    'border' => 'border border-slate-200 dark:border-slate-700',
    'hover' => 'hover:shadow-lg hover:scale-105',
    'bg' => 'bg-white dark:bg-slate-800',
])

<div
    class="{{ $bg }} {{ $rounded }} {{ $shadow }} {{ $border }} {{ $hover }} transition-all duration-300 overflow-hidden">
    {{ $slot }}
</div>
