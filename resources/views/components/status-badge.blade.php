@props(['status', 'color' => null])

@php
    $statusColors = [
        'active' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
        'inactive' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
        'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
        'success' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
        'error' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
        'warning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
        'info' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
        'default' => 'bg-slate-100 text-slate-800 dark:bg-slate-900 dark:text-slate-200',
    ];

    $badgeColor = $color ?? ($statusColors[strtolower($status)] ?? $statusColors['default']);
@endphp

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeColor }}">
    {{ ucfirst($status) }}
</span>
