@props(['message' => 'Tidak ada data.', 'icon' => null, 'action' => null])

<div class="text-center py-12">
    @if ($icon)
        <div class="mx-auto h-12 w-12 text-slate-400">
            {!! $icon !!}
        </div>
    @else
        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-5v2m0 0v2m0-2h2m-2 0h-2" />
        </svg>
    @endif

    <h3 class="mt-2 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $message }}</h3>

    @if ($action)
        <div class="mt-6">
            <a href="{{ $action['href'] }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow transition">
                @if (isset($action['icon']))
                    {!! $action['icon'] !!}
                @endif
                {{ $action['label'] }}
            </a>
        </div>
    @endif
</div>
