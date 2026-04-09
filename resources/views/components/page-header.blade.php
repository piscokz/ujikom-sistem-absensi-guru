@props(['title', 'subtitle' => null, 'actions' => []])

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">{{ $subtitle }}</p>
        @endif
    </div>

    @if (count($actions) > 0)
        <div class="flex items-center gap-3">
            @foreach ($actions as $action)
                @if ($action['type'] === 'link')
                    <a href="{{ $action['href'] }}"
                        class="inline-flex items-center gap-2 px-4 py-2 {{ $action['class'] ?? 'bg-indigo-600 hover:bg-indigo-700 text-white' }} text-sm font-medium rounded-lg shadow transition">
                        @if (isset($action['icon']))
                            {!! $action['icon'] !!}
                        @endif
                        {{ $action['label'] }}
                    </a>
                @elseif($action['type'] === 'button')
                    <button
                        {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 px-4 py-2 ' . ($action['class'] ?? 'bg-indigo-600 hover:bg-indigo-700 text-white') . ' text-sm font-medium rounded-lg shadow transition']) }}>
                        @if (isset($action['icon']))
                            {!! $action['icon'] !!}
                        @endif
                        {{ $action['label'] }}
                    </button>
                @endif
            @endforeach
        </div>
    @endif
</div>
