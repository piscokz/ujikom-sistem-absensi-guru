@props(['trigger', 'items' => []])

<div class="relative" x-data="{ open: false }" @click.outside="open = false">
    <div @click="open = ! open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 rounded-lg shadow-lg border border-slate-200 dark:border-slate-700 z-50"
        style="display: none;">
        <div class="py-1">
            @foreach ($items as $item)
                @if ($item['type'] === 'divider')
                    <div class="border-t border-slate-200 dark:border-slate-700 my-1"></div>
                @elseif($item['type'] === 'link')
                    <a href="{{ $item['href'] ?? '#' }}"
                        class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 hover:text-slate-900 dark:hover:text-slate-100 transition">
                        @if (isset($item['icon']))
                            {!! $item['icon'] !!}
                        @endif
                        {{ $item['label'] }}
                    </a>
                @elseif($item['type'] === 'button')
                    <button
                        {{ $attributes->merge(['class' => 'w-full text-left px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 hover:text-slate-900 dark:hover:text-slate-100 transition']) }}>
                        @if (isset($item['icon']))
                            {!! $item['icon'] !!}
                        @endif
                        {{ $item['label'] }}
                    </button>
                @endif
            @endforeach
        </div>
    </div>
</div>
