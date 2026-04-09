@props(['src' => null, 'alt' => '', 'size' => 'w-8 h-8', 'initials' => null])

@if ($src)
    <img class="{{ $size }} rounded-full object-cover border-2 border-white dark:border-slate-700 shadow-sm"
        src="{{ $src }}" alt="{{ $alt }}">
@else
    <div
        class="{{ $size }} rounded-full bg-slate-400 dark:bg-slate-600 flex items-center justify-center border-2 border-white dark:border-slate-700 shadow-sm">
        @if ($initials)
            <span class="text-xs font-medium text-white">{{ $initials }}</span>
        @else
            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                </path>
            </svg>
        @endif
    </div>
@endif
