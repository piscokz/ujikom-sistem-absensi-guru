@props(['padding' => 'px-6 py-4'])

<div class="{{ $padding }} border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
    {{ $slot }}
</div>
