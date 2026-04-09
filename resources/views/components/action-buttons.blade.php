@props(['actions' => []])

<div class="flex justify-end gap-3">
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
