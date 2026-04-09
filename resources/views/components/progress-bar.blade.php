@props(['value' => 0, 'max' => 100, 'color' => 'indigo', 'size' => 'h-2'])

@php
    $colorClasses = match ($color) {
        'green' => 'bg-green-600',
        'red' => 'bg-red-600',
        'yellow' => 'bg-yellow-600',
        'blue' => 'bg-blue-600',
        'indigo' => 'bg-indigo-600',
        'slate' => 'bg-slate-600',
        default => 'bg-indigo-600',
    };

    $percentage = min(100, max(0, ($value / $max) * 100));
@endphp

<div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full {{ $size }} overflow-hidden">
    <div class="h-full {{ $colorClasses }} transition-all duration-300 ease-out rounded-full"
        style="width: {{ $percentage }}%"></div>
</div>

@if ($slot->isNotEmpty())
    <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 text-center">
        {{ $slot }}
    </div>
@endif
