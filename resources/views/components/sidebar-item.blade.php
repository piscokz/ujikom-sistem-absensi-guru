@props(['href', 'active' => false, 'icon' => null])

<a href="{{ $href }}"
    class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-colors duration-200 {{ $active
        ? 'bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-slate-100'
        : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-slate-900 dark:hover:text-slate-100' }}">
    @if ($icon)
        <x-dynamic-component :component="'lucide-' . $icon" class="mr-3 h-5 w-5 flex-shrink-0" />
    @endif
    {{ $slot }}
</a>
