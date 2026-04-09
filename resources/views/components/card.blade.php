@props(['header' => null, 'footer' => null])

<x-card-container>
    @if ($header)
        <x-card-header :title="$header['title']" :subtitle="$header['subtitle'] ?? null" :actions="$header['actions'] ?? []" />
    @endif

    <x-card-body>
        {{ $slot }}
    </x-card-body>

    @if ($footer)
        <x-card-footer>
            {{ $footer }}
        </x-card-footer>
    @endif
</x-card-container>
