@props(['title'])

<div class="space-y-1">
    <h3 class="px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
        {{ $title }}
    </h3>
    <div class="space-y-1">
        {{ $slot }}
    </div>
</div>
