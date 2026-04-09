@props(['title', 'value', 'icon' => null, 'color' => 'indigo', 'change' => null])

@php
    $colorClasses = match ($color) {
        'green' => 'bg-green-50 dark:bg-green-900/40 border-green-200 dark:border-green-800',
        'red' => 'bg-red-50 dark:bg-red-900/40 border-red-200 dark:border-red-800',
        'blue' => 'bg-blue-50 dark:bg-blue-900/40 border-blue-200 dark:border-blue-800',
        'yellow' => 'bg-yellow-50 dark:bg-yellow-900/40 border-yellow-200 dark:border-yellow-800',
        'indigo' => 'bg-indigo-50 dark:bg-indigo-900/40 border-indigo-200 dark:border-indigo-800',
        'slate' => 'bg-slate-50 dark:bg-slate-900/40 border-slate-200 dark:border-slate-800',
        default => 'bg-indigo-50 dark:bg-indigo-900/40 border-indigo-200 dark:border-indigo-800',
    };

    $textColorClasses = match ($color) {
        'green' => 'text-green-700 dark:text-green-300',
        'red' => 'text-red-700 dark:text-red-300',
        'blue' => 'text-blue-700 dark:text-blue-300',
        'yellow' => 'text-yellow-700 dark:text-yellow-300',
        'indigo' => 'text-indigo-700 dark:text-indigo-300',
        'slate' => 'text-slate-700 dark:text-slate-300',
        default => 'text-indigo-700 dark:text-indigo-300',
    };
@endphp

<div
    class="{{ $colorClasses }} p-5 rounded-2xl shadow hover:shadow-lg hover:scale-105 transition-all duration-300 border">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-3xl font-bold {{ $textColorClasses }}">{{ $value }}</p>
            <p class="text-sm text-slate-600 dark:text-slate-300">{{ $title }}</p>
            @if ($change)
                <p class="text-xs {{ $change['type'] === 'increase' ? 'text-green-600' : 'text-red-600' }} mt-1">
                    {{ $change['value'] }} {{ $change['type'] === 'increase' ? '↑' : '↓' }}
                </p>
            @endif
        </div>
        @if ($icon)
            <div class="text-2xl {{ $textColorClasses }}">
                {!! $icon !!}
            </div>
        @endif
    </div>
</div>
