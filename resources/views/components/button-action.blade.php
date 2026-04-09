@props(['href' => null, 'color' => 'indigo', 'type' => 'link', 'method' => 'GET', 'confirm' => null])

@php
    $colorClasses = match ($color) {
        'blue'
            => 'bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-200 hover:bg-blue-200 dark:hover:bg-blue-700',
        'indigo'
            => 'bg-indigo-100 text-indigo-700 dark:bg-indigo-800 dark:text-indigo-200 hover:bg-indigo-200 dark:hover:bg-indigo-700',
        'green'
            => 'bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200 hover:bg-green-200 dark:hover:bg-green-700',
        'red' => 'bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200 hover:bg-red-200 dark:hover:bg-red-700',
        'slate'
            => 'bg-slate-100 text-slate-700 dark:bg-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-600',
        default
            => 'bg-indigo-100 text-indigo-700 dark:bg-indigo-800 dark:text-indigo-200 hover:bg-indigo-200 dark:hover:bg-indigo-700',
    };
@endphp

@if ($type === 'link')
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1.5 rounded-md transition text-sm ' . $colorClasses]) }}>
        {{ $slot }}
    </a>
@elseif($type === 'button')
    <button type="submit"
        {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1.5 rounded-md transition text-sm ' . $colorClasses, 'onclick' => $confirm ? "return confirm('$confirm')" : null]) }}>
        {{ $slot }}
    </button>
@elseif($type === 'form')
    <form action="{{ $href }}" method="{{ $method }}"
        onsubmit="{{ $confirm ? "return confirm('$confirm')" : '' }}" style="display: inline;">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif
        <button type="submit"
            {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1.5 rounded-md transition text-sm ' . $colorClasses]) }}>
            {{ $slot }}
        </button>
    </form>
@endif
