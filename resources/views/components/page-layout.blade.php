@props(['title', 'headerActions' => []])

@if (count($headerActions) > 0)
    <x-slot name="header">
        <x-page-header :title="$title" :actions="$headerActions" />
    </x-slot>
@else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
@endif

<div class="py-10">
    <x-section-container>
        {{ $slot }}
    </x-section-container>
</div>
