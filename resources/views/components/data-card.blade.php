@props(['title', 'subtitle' => null, 'actions' => []])

<div
    class="bg-white dark:bg-slate-800 p-5 rounded-2xl shadow hover:shadow-lg hover:scale-105 transition-all duration-300 border border-slate-200 dark:border-slate-700">
    <div class="mb-3">
        <h3 class="text-lg font-semibold text-slate-800 dark:text-white">
            {{ $title }}
        </h3>
        @if ($subtitle)
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    @if (count($actions) > 0)
        <div class="flex justify-end gap-2 mt-4">
            @foreach ($actions as $action)
                @if ($action['type'] === 'link')
                    <x-button-action href="{{ $action['href'] }}" color="{{ $action['color'] ?? 'indigo' }}">
                        {{ $action['label'] }}
                    </x-button-action>
                @elseif($action['type'] === 'form')
                    <x-button-action type="form" href="{{ $action['href'] }}" method="{{ $action['method'] ?? 'POST' }}"
                        color="{{ $action['color'] ?? 'red' }}" confirm="{{ $action['confirm'] ?? null }}">
                        {{ $action['label'] }}
                    </x-button-action>
                @endif
            @endforeach
        </div>
    @endif

    {{ $slot }}
</div>
