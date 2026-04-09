@props(['padding' => 'p-6'])

<div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm rounded-2xl">
    <div class="{{ $padding }}">
        {{ $slot }}
    </div>
</div>
