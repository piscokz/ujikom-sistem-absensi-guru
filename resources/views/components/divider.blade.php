@props(['text' => null])

@if ($text)
    <div class="relative">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-slate-300 dark:border-slate-600"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-400">{{ $text }}</span>
        </div>
    </div>
@else
    <div class="border-t border-slate-300 dark:border-slate-600"></div>
@endif
